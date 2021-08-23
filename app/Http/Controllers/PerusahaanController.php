<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Perusahaan;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\TesMBTI;
use App\Models\HasilTesMBTI;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PerusahaanController extends Controller
{
    private function getUserData()
    {
      return Auth::user();
    }

    public function index()
    {
        $perusahaan = Perusahaan::where('id_user' , Auth::user()->id)->first();
        $jmlTes = count(TesMBTI::where('id_perusahaan', $perusahaan->id)->get());
        $jmlPeserta = DB::table('perusahaan')
                        ->join('tes_mbti', 'perusahaan.id', '=', 'tes_mbti.id_perusahaan')
                        ->join('hasil_tes_mbti', 'tes_mbti.id', '=', 'hasil_tes_mbti.id_tes')
                        ->get();
                        
        return view('perusahaan.index')->with([
            'authData' => $this->getUserData(),
            'perusahaan' => $perusahaan,
            'jmlTes' => $jmlTes,
            'jmlPesertaTes' => count($jmlPeserta)
        ]);
    }

    public function perusahaan()
    {
      $perusahaan = Perusahaan::where('id_user' , Auth::user()->id)->first();
      if ($perusahaan == NULL) {
        return redirect()->route('perusahaan.add');
      }else {
          return view('perusahaan.perusahaan')->with([
              'authData' => $this->getUserData(),
              'perusahaan' => $perusahaan,
        ]);
      }
    }

    public function perusahaanAdd()
    {
      $provinsi = Province::all();

      return view('perusahaan.perusahaanAdd')->with([
        'authData' => $this->getUserData(),
        'provinsi' => $provinsi,
        ]);
    }

    public function getKota(Request $request)
    {
        $id = $request->provinsi_id;
        $kota = Regency::where('province_id', $id)
            ->orderBy('name')
            ->pluck('name', 'id');

        return response()->json($kota);
    }

    public function getKecamatan(Request $request)
    {
        $id = $request->kota_id;
        $kecamatan = District::where('regency_id', $id)
            ->orderBy('name')
            ->pluck('name', 'id');

        return response()->json($kecamatan);
    }

    public function getKelurahan(Request $request)
    {
        $id = $request->kecamatan_id;
        $kelurahan = Village::where('district_id', $id)
            ->orderBy('name')
            ->pluck('name', 'id');

        return response()->json($kelurahan);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            $user = Auth::user();

            if ($user->type == 99 || $user->type == 1) {

                $logo = $request->file('logo_perusahaan');

                $logoFileName = $logo->getClientOriginalName();


                $validateData = $this->validate($request, [
                    'alamat' => 'required',
                    'logo_perusahaan' => 'required|max:4096',
                    'no_telephone'  => 'required',
                ]);

                if($user->email != $request->email){
                    $validateData = $this->validate($request, [
                        'email'  => 'required|email|unique:users',
                    ]);
                    User::where('id', $user->id)->update(['email' => $request->email]);
                }

                if($user->name != $request->nama_perusahaan){
                    User::where('id', $user->id)->update(['name' => $request->nama_perusahaan]);
                }

                $savePerusahaan = Perusahaan::create([
                    'id_user' => $user->id,
                    'alamat' => $request->alamat,
                    'id_lokasi' => $request->indonesia_villages,
                    'no_telephone'  => $request->no_telephone,
                    'website' => $request->website,
                    'logo_perusahaan' => $logoFileName,
                    'status_perusahaan' => 0
                ]);

                DB::commit();
                
                $getPerusahaan = Perusahaan::where('id_user',$user->id)->first();
                $logo->storeAs('public/logo_perusahaan/'.$getPerusahaan->id.'/', $logoFileName);

                return redirect()->route('perusahaan.data')
                    ->with('success', 'Data Perusahaan created successfully.');
            } else {
                DB::rollback();
                return redirect()->back()->withErrors(['error' => "Role user tidak diizikan"]);
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function perusahaanEdit()
    {
        $user = $this->getUserData();
        $perusahaan = Perusahaan::where('id_user', $user->id)->first();
        $provinsi = Province::all();

        return view('perusahaan.perusahaanEdit', [
            'perusahaan' => $perusahaan,
            'provinsi' => $provinsi,
            'authData' => $this->getUserData(),
        ]);
    }

    public function update(Request $request)
    {
        DB::beginTransaction();

        $id = $request->id;

        $logo = $request->file('logo_perusahaan');

        $user = $this->getUserData();

        $validateData = $this->validate($request, [
            'alamat' => 'required',
            'logo_perusahaan' => 'max:4096',
            'no_telephone'  => 'required',
        ]);
        
        try {
            
            if($user->email != $request->email){
                $validateData = $this->validate($request, [
                    'email'  => 'required|email|unique:users',
                ]);
                User::where('id', $user->id)->update(['email' => $request->email]);
            }
    
            if($user->name != $request->nama_perusahaan){
                User::where('id', $user->id)->update(['name' => $request->nama_perusahaan]);
            }

            $perusahaan = Perusahaan::where('id', $id)->first();
            $updatePerusahaan = [
                'alamat' => $request->alamat,
                'id_lokasi' => $request->indonesia_villages,
                'no_telephone'  => $request->no_telephone,
                'website' => $request->website,
            ];

            if ($logo) {
                $logoFileName = $logo->getClientOriginalName();
                $deleteOldPhoto = Storage::delete('public/logo_perusahaan/' . $perusahaan->id. '/' . $perusahaan->logo_perusahaan);
                $uploadNewPhoto =  $logo->storeAs('public/logo_perusahaan', $logoFileName);
                $updatePerusahaan['logo_perusahaan'] = $logoFileName;
            }

            $perusahaan->update($updatePerusahaan);

            DB::commit();

            return redirect()->route('perusahaan.data')
                ->with('success', 'Data Perusahaan updated successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function TesMBTI()
    {
      $user = $this->getUserData();
      $perusahaan = Perusahaan::where('id_user', $user->id)->first();
      if($perusahaan !== NULL) {
          if ($perusahaan->status_perusahaan == 0) {
              return redirect()->route('perusahaan.data')->with(['error' => 'Perusahaan anda belum disetujui!']);
            }else {
            $tesMBTI = TesMBTI::all()->where('id_perusahaan', $perusahaan->id);
            return view('perusahaan.tes.index')->with(['authData' => $this->getUserData(), 'tesMBTI' => $tesMBTI]);
          }
      } else {
        return redirect()->route('perusahaan.data')->with(['error' => 'Isi Data Perusahaan Terlebih dahulu!']);
      }

    }

    public function tesCreate()
    {
      return view('perusahaan.tes.create')->with([
        'authData' => $this->getUserData()
      ]);
    }

    public function tesStore(Request $request)
    {
        $user = $this->getUserData();
        $perusahaan = Perusahaan::where('id_user', $user->id)->first();
        do {
            $token =  Str::upper(Str::random(8));
          } while (TesMBTI::where('token', $token)->first() != NULL);
        // dd($token);

		$saveData = TesMBTI::create([
            'id_perusahaan' => $perusahaan->id,
            'token' => $token,
            'keterangan' => $request->keterangan,
            'tanggal_dibuka' => $request->tanggal_dibuka,
            'tanggal_ditutup' => $request->tanggal_ditutup,
        ]);

        return redirect()->route('perusahaan.tes')
                        ->with('success','Tes created successfully.');

    }


    public function tesEdit($id)
    {
        $tes = TesMBTI::where('id', $id)->first();

      return view('perusahaan.tes.edit')->with([
        'authData' => $this->getUserData(),
        'tes' => $tes,
      ]);
    }

    public function tesUpdate(Request $request) {
        $id = $request->id;
        $updateData = TesMBTI::where('id', $id)
            ->update([
                'token' => $request->token,
                'keterangan' => $request->keterangan,
                'tanggal_dibuka' => $request->tanggal_dibuka,
                'tanggal_ditutup' => $request->tanggal_ditutup,
            ]
        );

        return redirect()->route('perusahaan.tes')
                        ->with('success','Tes Update successfully.');
    }

    public function tesShow($id)
    {
        $tes = TesMBTI::where('id', $id)->first();
        $dataPesertaTes = HasilTesMBTI::where('id_tes', $id)->get();
        return view('perusahaan.tes.show')->with([
            'authData' => $this->getUserData(),
            'tes' => $tes,
            'dataPesertaTes' => $dataPesertaTes,  
        ]);
    }

    public function tesExportExcel($id){
        $tes = TesMBTI::where('id', $id)->first();
        $dataPesertaTes = HasilTesMBTI::where('id_tes', $id)->get();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Peserta');
        $sheet->setCellValue('C1', 'Kepribadian');
        $sheet->setCellValue('D1', 'Introvert(I)');
        $sheet->setCellValue('E1', 'Extrovert(E)');
        $sheet->setCellValue('F1', 'Sensing(S)');
        $sheet->setCellValue('G1', 'Intuition(N)');
        $sheet->setCellValue('H1', 'Thinking(T)');
        $sheet->setCellValue('I1', 'Feeling(F)');
        $sheet->setCellValue('J1', 'Juding(J)');
        $sheet->setCellValue('K1', 'Perceiving(P)');
        $cell = 2;
        $no = 1;
        foreach($dataPesertaTes as $row){
            $sheet->setCellValue('A'.$cell, $no);
            $sheet->setCellValue('B'.$cell, $row->nama_peserta_tes);
            $sheet->setCellValue('C'.$cell, $row->personality);
            $sheet->setCellValue('D'.$cell, $row->I.'%');
            $sheet->setCellValue('E'.$cell, $row->E.'%');
            $sheet->setCellValue('F'.$cell, $row->S.'%');
            $sheet->setCellValue('G'.$cell, $row->N.'%');
            $sheet->setCellValue('H'.$cell, $row->T.'%');
            $sheet->setCellValue('I'.$cell, $row->F.'%');
            $sheet->setCellValue('J'.$cell, $row->J.'%');
            $sheet->setCellValue('K'.$cell, $row->P.'%');
            
            $cell++;
            $no++;
        }
        $writer = new Xlsx($spreadsheet);        
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$tes->perusahaan->user->name.' Daftar Peserta '.$tes->keterangan.'.xlsx"');
        $writer->save('php://output');
    }

    public function tesDelete($id)
    {
        $tes = TesMBTI::where('id', $id)->delete();

        return redirect()->route('perusahaan.tes')
            ->with('success', 'Tes deleted successfully');
    }

    public function pesertaShow($id)
    {
        $peserta = HasilTesMBTI::where('id', $id)->get();
        return view('perusahaan.tes.showPeserta')->with([
            'authData' => $this->getUserData(),
            'dataPesertaTes' => $peserta,  
        ]);
    }

    public function pesertaDelete($id)
    {
        $peserta = HasilTesMBTI::where('id', $id)->delete();

        return redirect()->route('perusahaan.tes')
            ->with('success', 'Peserta deleted successfully');
    }

    public function profile()
    {
      return view('perusahaan.profile')->with(['authData' => $this->getUserData()]);
    }

    public function profileEdit()
    {
      return view('perusahaan.profile-edit')->with(['authData' => $this->getUserData()]);
    }

    public function profileUpdate(Request $request)
    {
        $validateData = $this->validate($request, [
            'name' => 'required',
            'email' => 'unique:users',
              ]);
          $user = $this->getUserData();
          $name = $request->name;
          $email = $request->email;

          if($name != NULL){
              $saveData = User::where('id', $user->id)
              ->update(['name' => $name]);
          }
          if($email != NULL){
              $saveData = User::where('id', $user->id)
              ->update(['email' => $email]);
          }

          return redirect()->route('perusahaan.profile')
                          ->with('update-user-success','Update User berhasil!');
    }

    public function updatePassword(Request $request)
    {
      $id = $request->id;

      $validateData = $this->validate($request, [
        'password' => 'required|same:repassword',
        'repassword' => 'required',
      ]);

      $password = $request->password;

      $saveData = User::where('id', $id)
        ->update(['password' => Hash::make($password)]);
      return redirect()->route('perusahaan.profile')
                       ->with('update-pass-success','Ubah password berhasil');
    }
    
}

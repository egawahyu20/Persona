<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UserController as userCtrl;

use App\Models\User;
use App\Models\Perusahaan;
use App\Models\TesMBTI;
use App\Models\HasilTesMBTI;
use App\Models\Province;

class AdminController extends Controller
{
  function __construct()
  {
    $this->middleware('admin');
  }

  private function getAdminData()
  {
    return Auth::user();
  }

    public function index()
    {
      return view('admin.dashboard')
        ->with([
          'admin' => $this->getAdminData(), 
          'jmlUser' => count(User::all()),
          'jmlPerusahaan' => count(Perusahaan::all()),
          'jmlTes' => count(TesMBTI::all()),
          'jmlDataTes' => count(HasilTesMBTI::all())
        ]);
    }

    public function user() {
		$user = User::all();
		return view('admin.users.index')->with(['user' => $user, 'admin' => $this->getAdminData()]);
    }

    public function perusahaan() {
    $perusahaan = Perusahaan::all();
    return view('admin.perusahaan.index')->with(['perusahaan' => $perusahaan, 'admin' => $this->getAdminData()]);
    }

    public function showPerusahaan($id)
    {
      $perusahaan = Perusahaan::where('id', $id)->first();
      return view('admin.perusahaan.show', ['perusahaan' => $perusahaan , 'admin' => $this->getAdminData()]);
    }

    public function editPerusahaan($id)
    {
      $perusahaan = Perusahaan::where('id', $id)->first();
      $provinsi = Province::all();

      return view('admin.perusahaan.edit', [
        'perusahaan' => $perusahaan,
        'provinsi' => $provinsi,
        'admin' => $this->getAdminData()
      ]);
    }

    public function updatePerusahaan(Request $request)
    {
        DB::beginTransaction();

        $id = $request->id;

        $logo = $request->file('logo_perusahaan');

        $validateData = $this->validate($request, [
            'alamat' => 'required',
            'logo_perusahaan' => 'max:4096',
            'no_telephone'  => 'required',
        ]);
        
        try {
          $perusahaan = Perusahaan::where('id', $id)->first();
            
            if($perusahaan->user->email != $request->email){
                $validateData = $this->validate($request, [
                    'email'  => 'required|email|unique:users',
                ]);
                User::where('id', $perusahaan->user->id)->update(['email' => $request->email]);
            }
    
            if($perusahaan->user->name != $request->nama_perusahaan){
                User::where('id', $perusahaan->user->id)->update(['name' => $request->nama_perusahaan]);
            }

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

            return redirect()->route('admin.perusahaan')
                ->with('success', 'Data Perusahaan updated successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function acceptedPerusahaan($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->status_perusahaan = 1;
        $perusahaan->save();

        return redirect()->route('admin.perusahaan')
            ->with('success', 'Perusahaan accepted successfully.');
    }

    public function declinePerusahaan($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->status_perusahaan = 2;
        $perusahaan->save();

        // $perusahaan = perusahaan::where('id', $id)->delete();

        return redirect()->route('admin.perusahaan')
            ->with('success', 'Penyedia Kerja decline  successfully.');
    }

    public function deletePerusahaan($id)
    {
        $penyediaKerja = PenyediaKerja::where('id', $id)->first();

        $hapusLogo = Storage::delete('public/logo_perusahaan/' . $penyediaKerja['logo_perusahaan']);
        $hapusNpwp = Storage::delete('public/npwp/' . $penyediaKerja->dokumen['npwp']);
        $hapusSop = Storage::delete('public/sop/' . $penyediaKerja->dokumen['sop']);
        $hapusSurat = Storage::delete('public/surat/' . $penyediaKerja->dokumen['surat_domisili']);

        $penyediaKerja->delete($hapusLogo, $hapusNpwp, $hapusSop, $hapusSurat);

        return redirect()->route('admin.penyediaKerja')
            ->with('success', 'Penyedia Kerja deleted successfully');
    }

    public function profile()
    {
      return view('admin.profile')->with(['admin' => $this->getAdminData()]);
    }

    public function profileEdit()
    {
      return view('admin.profile-edit')->with(['admin' => $this->getAdminData()]);
    }

    public function profileUpdate(Request $request)
    {
          $validateData = $this->validate($request, ['email' => 'unique:users' ]);
          $admin = $this->getAdminData();

          $name = $request->name;
          $email = $request->email;

          if($name != NULL){
              $saveData = User::where('id', $admin->id)
              ->update(['name' => $name]);
          }
          if($email != NULL){
              $saveData = User::where('id', $admin->id)
              ->update(['email' => $email]);
          }

          return redirect()->route('admin.profile')
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
      return redirect()->route('admin.profile')
                       ->with('update-pass-success','Ubah password berhasil');
    }

    public function setting()
    {
      return view('admin.setting')->with(['admin' => $this->getAdminData()]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\MbtiCharacteristics as char;
use App\Models\MbtiInterprestation as interpres;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MbtiCharacteristicsController extends Controller
{
    
    private function getAdminData()
    {
      return Auth::user();
    }

    public function index(){
        return view('admin.mbti.characteristic.index')
        ->with([
            'admin' => $this->getAdminData(),
            'char' => char::all(),
            'interpres' => interpres::all(),
        ]);
    }

    public function create()
    {
        return view('admin.mbti.characteristic.create')->with(['admin' => $this->getAdminData(),'interpres' => interpres::all(),]);
    }

    public function store(Request $request)
    {
        $validateData = $this->validate($request, [
            'mbti_interprestation_id' => 'required',
            'characteristic' => 'required',
		]);
        $mbti_interprestation_id = $request->mbti_interprestation_id;
        $characteristic = $request->characteristic;

		$saveData = char::create([
            'mbti_interprestation_id' => $mbti_interprestation_id,
            'characteristic' => $characteristic,
        ]);

        return redirect()->route('mbti.characteristic')
                        ->with('success','Characteristic created successfully.');
    }    

    public function edit($id)
    {
        $char = char::where('id' , $id)->get();
        return view('admin.mbti.characteristic.edit')->with(['char' => $char, 'admin' => $this->getAdminData(), 'interpres' => interpres::all(),]);
    }

    public function update(Request $request)
    {
        $id = $request->id;

		$validateData = $this->validate($request, [
            'mbti_interprestation_id' => 'required',
            'characteristic' => 'required',
        ]);

        $mbti_interprestation_id = $request->mbti_interprestation_id;
        $characteristic = $request->characteristic;

		$saveData = char::where('id', $id)
		->update([
            'mbti_interprestation_id' => $mbti_interprestation_id,
            'characteristic' => $characteristic,
        ]);

        return redirect()->route('mbti.characteristic')
                        ->with('success','Characteristic updated successfully');
    }

    public function delete($id)
    {
        $hapus = char::where('id', $id)->delete();

        return redirect()->route('mbti.characteristic')
            ->with('success', 'Characteristic deleted successfully');
    }
}

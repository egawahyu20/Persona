<?php

namespace App\Http\Controllers;

use App\Models\MbtiDevelopmentSuggestion as dev;
use App\Models\MbtiInterprestation as interpres;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MbtiDevelopmentSuggestionController extends Controller
{
    
    private function getAdminData()
    {
      return Auth::user();
    }

    public function index(){
        return view('admin.mbti.development.index')
        ->with([
            'admin' => $this->getAdminData(),
            'dev' => dev::all(),
            'interpres' => interpres::all(),
        ]);
    }

    public function create()
    {
        return view('admin.mbti.development.create')->with(['admin' => $this->getAdminData(),'interpres' => interpres::all(),]);
    }

    public function store(Request $request)
    {
        $validateData = $this->validate($request, [
            'mbti_interprestation_id' => 'required',
            'development_suggestion' => 'required',
		]);
        $saveData = new dev;
        $saveData->mbti_interprestation_id = $request->mbti_interprestation_id;
        $saveData->development_suggestion = $request->development_suggestion;
        $saveData->save();

        return redirect()->route('mbti.development')
                        ->with('success','Development created successfully.');
    }    

    public function edit($id)
    {
        $dev = dev::where('id' , $id)->get();
        return view('admin.mbti.development.edit')->with(['dev' => $dev, 'admin' => $this->getAdminData(), 'interpres' => interpres::all(),]);
    }

    public function update(Request $request)
    {
        $id = $request->id;

		$validateData = $this->validate($request, [
            'mbti_interprestation_id' => 'required',
            'development_suggestion' => 'required',
        ]);

        $mbti_interprestation_id = $request->mbti_interprestation_id;
        $development_suggestion = $request->development_suggestion;

		$saveData = dev::where('id', $id)
		->update([
            'mbti_interprestation_id' => $mbti_interprestation_id,
            'development_suggestion' => $development_suggestion,
        ]);

        return redirect()->route('mbti.development')
                        ->with('success','Development updated successfully');
    }

    public function delete($id)
    {
        $hapus = dev::where('id', $id)->delete();

        return redirect()->route('mbti.development')
            ->with('success', 'development deleted successfully');
    }
}

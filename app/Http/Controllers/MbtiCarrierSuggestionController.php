<?php

namespace App\Http\Controllers;

use App\Models\MbtiCarrierSuggestion as carrier;
use App\Models\MbtiInterprestation as interpres;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MbtiCarrierSuggestionController extends Controller
{
    
    private function getAdminData()
    {
      return Auth::user();
    }

    public function index(){
        return view('admin.mbti.carrier.index')
        ->with([
            'admin' => $this->getAdminData(),
            'carrier' => carrier::all(),
            'interpres' => interpres::all(),
        ]);
    }

    public function edit($id)
    {
        $carrier = carrier::where('id' , $id)->get();
        return view('admin.mbti.carrier.edit')->with(['carrier' => $carrier, 'admin' => $this->getAdminData(), 'interpres' => interpres::all(),]);
    }

    public function update(Request $request)
    {
        $id = $request->id;

		$validateData = $this->validate($request, [
            'mbti_interprestation_id' => 'required',
            'carrier_suggestion' => 'required',
        ]);

        $mbti_interprestation_id = $request->mbti_interprestation_id;
        $carrier_suggestion = $request->carrier_suggestion;

		$saveData = carrier::where('id', $id)
		->update([
            'mbti_interprestation_id' => $mbti_interprestation_id,
            'carrier_suggestion' => $carrier_suggestion,
        ]);

        return redirect()->route('mbti.carrier')
                        ->with('success','carrier updated successfully');
    }
}

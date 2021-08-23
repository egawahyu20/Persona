<?php

namespace App\Http\Controllers;

use App\Models\MbtiInterprestation as interpres;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MbtiInterprestationController extends Controller
{
    
    private function getAdminData()
    {
      return Auth::user();
    }

    public function index(){
        return view('admin.mbti.interprestation.index')
        ->with([
            'admin' => $this->getAdminData(),
            'interpres' => interpres::all()]);
    }

    public function edit($id)
    {
        $interpres = interpres::where('id' , $id)->get();
        return view('admin.mbti.interprestation.edit')->with(['interpres' => $interpres, 'admin' => $this->getAdminData()]);
    }

    public function update(Request $request)
    {
        $id = $request->id;

		$validateData = $this->validate($request, [
            'personality' => 'required',
            'alias' => 'required',
            'partner' => 'required',
        ]);

        $personality = $request->personality;
        $alias = $request->alias;
        $partner = $request->partner;

		$saveData = interpres::where('id', $id)
		->update([
            'personality' => $personality,
            'alias' => $alias,
            'partner' => $partner,
        ]);

        return redirect()->route('mbti.interpres')
                        ->with('success','User updated successfully');
    }
}

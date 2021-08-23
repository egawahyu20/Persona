<?php

namespace App\Http\Controllers;

use App\Models\SoalTes as question;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MbtiQuestionController extends Controller
{
    
    private function getAdminData()
    {
      return Auth::user();
    }

    public function index(){
        return view('admin.mbti.question.index')
        ->with([
            'admin' => $this->getAdminData(),
            'question' => question::all()]);
    }

    public function edit($id)
    {
        $question = question::where('id' , $id)->get();
        return view('admin.mbti.question.edit')->with(['question' => $question, 'admin' => $this->getAdminData()]);
    }

    public function update(Request $request)
    {
        $id = $request->id;

		$validateData = $this->validate($request, [
            'statement1' => 'required',
            'type1' => 'required',
            'statement2' => 'required',
            'type2' => 'required',
        ]);

        $statement1 = $request->statement1;
        $type1 = $request->type1;
        $statement2 = $request->statement2;
        $type2 = $request->type2;

		$saveData = question::where('id', $id)
		->update([
            'statement1' => $statement1,
            'type1' => $type1,
            'statement2' => $statement2,
            'type2' => $type2,
        ]);

        return redirect()->route('mbti.question')
                        ->with('success','Pernyataan berhasil diupdate.');
    }
}
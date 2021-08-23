<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private function getAdminData()
    {
      return Auth::user();
    }

    public function create()
    {
        return view('admin.users.create')->with(['admin' => $this->getAdminData()]);
    }

    public function store(Request $request)
    {
        $validateData = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'type' => 'required',
		]);
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $type = $request->type;

		$saveData = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'type' => $type,
        ]);

        $url = route('email.verify',$email);
        \Mail::to($email)
        ->send(new \App\Mail\VerifikasiMail($name, $url));

        return redirect()->route('admin.user')
                        ->with('success','User created successfully.');
    }

    public function show($id)
    {
        $user = User::where('id' , $id)->get();
        return view('admin.users.show',['user' => $user],['admin' => $this->getAdminData()]);
    }

    public function edit($id)
    {
        $user = User::where('id' , $id)->get();
        return view('admin.users.edit')->with(['user' => $user, 'admin' => $this->getAdminData()]);
    }

    public function update(Request $request)
    {
        $id = $request->id;

		$validateData = $this->validate($request, [
            'name' => 'required',
            'email' => 'unique:users',
            'type' => 'required',
        ]);

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $type = $request->type;

		$saveData = User::where('id', $id)
		->update([
            'type' => $type,
        ]);
        if($name != NULL){
            $saveData = User::where('id', $id)
            ->update(['name' => $name]);
        }
        if($email != NULL){
            $saveData = User::where('id', $id)
            ->update(['email' => $email]);
        }
        if($password != NULL){
            $saveData = User::where('id', $id)
            ->update(['password' => Hash::make($password)]);
        }

        return redirect()->route('admin.user')
                        ->with('success','User updated successfully');
    }

    public function accepted($id)
    {
        $user = User::findOrFail($id);
        $user->status = 1;
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->save();

        return redirect()->route('admin.user')
            ->with('success', 'User accepted successfully.');
    }

    public function decline($id)
    {
        $user = User::findOrFail($id);
        $user->status = 2;
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->save();

        User::where('id' , $id)->delete();

        return redirect()->route('admin.user')
            ->with('success', 'User decline successfully.');
    }

    public function delete($id)
    {
        User::where('id' , $id)->delete();
        return redirect()->route('admin.user')
                        ->with('success','User deleted successfully');
    }
}

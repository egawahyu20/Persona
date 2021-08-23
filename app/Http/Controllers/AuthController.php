<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
      return view('auth.login');
    }

    public function register()
    {
      return view('auth.registrasi');
    }

    public function store(Request $request)
    {
      $validateData = $this->validate($request, [
            'nama_perusahaan' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|same:repassword',
            'repassword' => 'required',
	    ]);

      $name = $request->nama_perusahaan;
      $email  = $request->email;
      $password = $request->password;
      $type = 1;
      $status = 0;

      $saveData = User::create([
        'name' => $name,
        'email' => $email,
        'password' => Hash::make($password),
        'type' => $type,
        'status' => $status
      ]);
      $url = route('email.verify',$email);
      \Mail::to($email)
      ->send(new \App\Mail\VerifikasiMail($name, $url));
          return redirect()->route('auth.login')
                          ->with('success','User berhasil dibuat. Silahkan cek email anda untuk verifikasi akun!');
    }

    public function authCheck(Request $request)
    {
      $validateData = $this->validate($request, [
        'email' => 'required',
        'password' => 'required',
		  ]);

      $email = $request->email;
      $pass = $request->password;

      $cekUser = User::where('email', $email)->first();
      // dd($cekUser);

          if($cekUser == NULL){
            return redirect('login')->with('failed','Akun tidak ditemukan');
          } else
          if($cekUser != NULL AND Hash::check($pass , $cekUser->password)){
            Auth::login($cekUser);
            $request->session()->regenerate();

            if($cekUser->type == 99){
              return redirect()->intended('admin');
            }elseif ($cekUser->type == 1 && $cekUser->status == 1 ){
              return redirect('perusahaan');
            }else {
              Auth::logout();
              $request->session()->invalidate();
              $request->session()->regenerateToken();
              return redirect('/login')->with('failed','Verifikasi email anda terlebih dahulu!');
            }
          }else {
            return redirect('login')->with('failed','Password salah');
          }
    }

    public function verifyEmail($email){
      $user = User::where('email',$email)->first();
      $user->status = 1;
      $user->email_verified_at = date('Y-m-d H:i:s');
      $user->save();

      return redirect('login')->with('success','Email berhasil diverifikasi, silahkan login');
    }

    public function forgetPassword(){
      return view('forget-password');
    }

    public function forgetPasswordSent(Request $request){
      $validateData = $this->validate($request, ['email' => 'required|email']);
      $email  = $request->email;
      $user = User::where('email_user',$email)->first();
      if ($user != NULL) {
        $token = Str::random(8);
        $saveData = PasswordReset::create([
          'email' => $email,
          'token' => $token,
          'created_at' => date(now())
        ]);
  
        $url = route('login.resetPassword', ['email' => $email,'token' => $token]);
        \Mail::to($email)
            ->send(new \App\Mail\ResetPasswordMail($email, $url));
        return view('forget-password-sent')->with(['email'=>$email]);
      }else {
        return redirect('forget-password')->with('failed','Email tidak terdaftar pada sistem, silahkan buat akun!');
      }
    }

    public function resetPassword($email, $token){
      $dataResetPassword = PasswordReset::all()->where('email', $email)->sortByDesc('created_at')->first();
      if($dataResetPassword == NULL){
        return redirect('forget-password')->with('failed','Data reset password tidak terdaftar!');
      }else 
      if($dataResetPassword != NULL){
        if($dataResetPassword->token == $token){
          $user = User::where('email_user',$email)->first();
          return view('reset-password')->with(['user'=>$user]);
        }else{
          return redirect('forget-password')->with('failed','Anda tidak punya akses untuk mengubah password!');
        }
      }else{
        return redirect('forget-password')->with('failed','Anda tidak punya akses untuk mengubah password!');
      }
    }

    public function changePassword(Request $request){
      $id = $request->id;

      $validateData = $this->validate($request, [
        'password' => 'required|same:repassword',
        'repassword' => 'required',
      ]);

      $password = $request->password;

      $saveData = User::where('id', $id)
        ->update(['password' => Hash::make($password)]);
      return redirect()->route('login.login')
                       ->with('success','Ubah password berhasil');
    }

    public function logout(Request $request){
      Auth::logout();

      $request->session()->invalidate();

      $request->session()->regenerateToken();

      return redirect('/');
    }
}

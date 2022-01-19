<?php

namespace App\Http\Controllers\otentikasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class OtentikasiController extends Controller
{
    //
   public function index() {

        return view('otentikasi.login');
    }

     public function daftar() {

        return view('otentikasi.daftar');
    }

      public function daftar_input( Request $request)     {
        // return  User::create([
        //     // 'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);
       $val = [
           'username' => ['required', 'string','unique:users'],

        ];
        $input_val = validator()->make(request()->all(), $val);

        if ($input_val->fails()) {
            return redirect('daftar_form')->with('message', 'Nik Sudah Terdaftar');
        }

        // $pass = [

        //     'password' => ['required', 'string', 'min:8'],
        // ];
        // $pass_val = validator()->make(request()->all(), $pass);

        // if ($pass_val->fails()) {
        //     return redirect('daftar_form')->with('message', 'Password Minimal 8 karakter');
        // }


            User::create([
            'username'=>$request['username'],
            'password'=>Hash::make($request['password']),
            'role'=>'user',
            ]);


            return redirect('/')->with('sukses', 'Berhasil Mendaftar Akun');
    }

    public function login(Request $request) {

        // $data = User::where('email',$request->email)->firstOrFail();
        // if ($data) {
        //     if (Hash::check($request->password,$data->password)) {
        //         session(['berhasil_login'=>true]);
        //         return redirect('/dashboard');
        //     }
        // }
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            if (auth()->user()->role == 'admin') {
            return redirect()->route('pendaftaran_admin');
        }else{
            return redirect('/pendaftaran');
        }

        }
        return redirect('/')->with('message','Username atau Password Salah');
    }

    public function logout(Request $request) {
        // $request->session()->flush();
        Auth::logout();
        return redirect('/');
        }
}

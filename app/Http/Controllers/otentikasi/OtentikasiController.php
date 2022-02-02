<?php

namespace App\Http\Controllers\otentikasi;

use App\User;
use App\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OtentikasiController extends Controller
{
    //
   public function index() {

        return view('otentikasi.login');
    }

     public function daftar() {

        return view('otentikasi.daftar');
    }

      public function daftar_input( Request $request) {
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

       $trans = DB::transaction(function () use ($request) {
        $date_input = strtotime($request->tanggal_lahir);
        $date= date('Y-m-d',$date_input);

           $cek = Biodata::where('nik',$request->input('nik'))->get();

            if ($cek->isEmpty()) {
                $bio = DB::table('tbl_master_biodata')->insertGetId([
                        'nik' => $request->input('nik'),
                        'nama' => $request->input('nama'),
                        'no_hp' => $request->input('no_hp'),
                        'alamat' => $request->input('alamat'),
                        'tempat_lahir' => $request->input('tempat_lahir'),
                        'tanggal_lahir' => $date,
                        // "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
                        // "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
                    ]);

                   DB::table('users')->insertGetId([
                        'username'=>$request['username'],
                        'password'=>Hash::make($request['password']),
                        'role'=>'user',
                        'biodata_id'=>$bio
                    ]);


            } else {
                $bio = DB::table('tbl_master_biodata')->where('nik',$request->input('nik'))->update([
                        'nik' => $request->input('nik'),
                        'nama' => $request->input('nama'),
                        'no_hp' => $request->input('no_hp'),
                        'alamat' => $request->input('alamat'),
                        'tempat_lahir' => $request->input('tempat_lahir'),
                        'tanggal_lahir' => $date,
            ]);

            $id = Biodata::where('nik',$request->input('nik'))->get();
                DB::table('users')->insertGetId([
                        'username'=>$request['username'],
                        'password'=>Hash::make($request['password']),
                        'role'=>'user',
                        'biodata_id'=>$id[0]['id'],
                    ]);


            }




        });
        // dd($trans);


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
            return redirect()->route('dashboard');
        }else{
            return redirect('dashboard');
        }

        }
        return redirect('/')->with('message','Username atau Password Salah');
    }

    public function logout(Request $request) {
        // $request->session()->flush();
        Auth::logout();
        return redirect('/');
        }

        public function periksa(Request $request) {
        $bio = Biodata::where('nik',$request->input('nik'))->get();
        if ($bio->isEmpty()) {
        return response()->json('kosong');
        }else{
            return response()->json([
            true,
            'bio' => $bio,
        ]);
        }

    }
}

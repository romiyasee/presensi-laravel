<?php namespace MyCompany\Pegawai\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use MyCompany\Pegawai\Models\Pegawai;
// Tidak perlu 'use Hash'

class Auth extends Controller
{
    public function login()
    {
        if (Session::has('pegawai_id')) {
            return Redirect::to('/presensi');
        }
        return View::make('mycompany.pegawai::login');
    }

    public function loginProcess(Request $request)
{
    $credentials = $request->only('email', 'password');
    $pegawai = \MyCompany\Pegawai\Models\Pegawai::where('email', $credentials['email'])->first();

    if ($pegawai && $credentials['password'] == $pegawai->password) {
        \Session::put('pegawai_id', $pegawai->id);
        return \Redirect::to('/presensi');
    }

    return \Redirect::back()->with('error', 'Email atau password salah.');
}


    public function logout()
    {
        Session::forget('pegawai_id');
        return Redirect::to('/login')->with('success', 'Anda berhasil logout.');
    }
}
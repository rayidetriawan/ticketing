<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function index()
    {
        return view('auth.index');
    }

    public function login(Request $request){
        // $data = User::where('email', $request->email)->firstOrFail();
        // if ($data) {
        //     // dd($request->password);
        //     if (Hash::check($request->password, $data->password)) {
        //         session(['berhasil_login' => true]);
        //         return redirect('/dashboard');
        //     }
        // }
        // if (Auth::attempt(['email' => $request->email, 'password'=>$request->password])) {
        //     return redirect('/dashboard');
        // }
        // return redirect('/')->with('message','Email atau Password salah!');
    }

    public function logout(Request $request)
    {
        // $request->session()->flush();
        // Auth::logout();
        // return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Karyawan;
use App\Tiket;
use App\Rating;

class AuthController extends Controller
{
    //
    public function index()
    {
        
        $data = User::paginate(10);
        $karyawan = Karyawan::orderBy('nama', 'ASC')->get();
        return view('master.user', compact('data','karyawan'));
    }

    public function simpan(Request $request){
        $cek = User::where('username', '=', $request->nik)->first();
        if($cek){
            $karyawan = Karyawan::where('nik', '=', $request->nik)->firstOrFail();
            return redirect()->route('user')->with('message','User '.$karyawan->nama.' Sudah Ada!');
        }
        $validate = $request->validate([
            'nik'      => 'required',
            'password' => 'required|min:5',
            'level'    => 'required',
            'email'    => 'required|email',
        ],
        [
            'nik.required'      => 'Bidang ini tidak boleh kosong !',
            'password.required' => 'Bidang ini tidak boleh kosong !',
            'level.required'    => 'Bidang ini tidak boleh kosong !',
            'email.required'    => 'Bidang ini tidak boleh kosong !',

            'password.max' => 'Minimal 5 Karakter!',
        ]);

        $karyawan = Karyawan::where('nik', '=', $request->nik)->firstOrFail();
        
        $data = [
            'name'      => $karyawan->nama,
            'username'  => $request->nik,
            'password'  => Hash::make($request->password),
            'role'      => $request->level,
            'email'     => $request->email,
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s')
        ];

        User::insert($data);

        return redirect()->route('user')->with('message','Data '.$karyawan->nama.' Berhasil Disimpan!');
    }

    public function edit($id)
    {
        $data = User::where('id', '=', $id)->first();

        return response()->json($data);
    }

    public function update(Request $request)
    {

        if($request->password){
           
            $request->validate([
                'edit_email'        => 'required',
                'edit_level'        => 'required',
                'password'          => 'min:5',
            ],
            [
                'edit_email.required'   => 'Bidang ini tidak boleh kosong !',
                'edit_level.required'   => 'Bidang ini tidak boleh kosong !',
                'password.max'          => 'Minimal 5 Karakter!',
            ]);

            $data = [
                'password'  => Hash::make($request->password),
                'role'      => $request->edit_level,
                'email'     => $request->edit_email, 
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }else{
            $request->validate([
                'edit_email'        => 'required',
                'edit_level'             => 'required',
            ],
            [
                'edit_email.required'   => 'Bidang ini tidak boleh kosong !',
                'edit_level.required'        => 'Bidang ini tidak boleh kosong !',
            ]);

            $data = [
                'role'      => $request->edit_level,
                'email'     => $request->edit_email, 
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }
        
        User::where('id', $request->id)->update($data);

        return redirect()->route('user')->with('message','Data Berhasil Diubah!');

    }

    public function hapus($id)
    {
        User::where('id', $id)->delete();

        return redirect()->back()->with('message','Data Berhasil Dihapus!');
    }

    public function login(Request $request){
        
        if (Auth::attempt(['username' => $request->username, 'password'=>$request->password])) {
            //cek apakah ada tiket yg solved ?
            $cektiket = Tiket::where('reported','=', Auth::user()->username)
            ->where('status','=', 0)
            ->get();
        $data = null;
        if(Auth::user()->role == 'teknisi'){
            $jumlah_tiket= Tiket::where('id_teknisi', Auth::user()->username)->count();
            $onprogress = Tiket::where('id_teknisi', Auth::user()->username)->where('status',4)->count();
            $done_tiket = Tiket::where('id_teknisi', Auth::user()->username)->where('status',0)->count();
        }else{

            $jumlah_tiket   = Tiket::where('reported','=', Auth::user()->username)
                                ->count();
            $onprogress     = Tiket::where('reported','=', Auth::user()->username)
                                ->where('status','=', 4)
                                ->count();
            $done_tiket     = Tiket::where('reported','=', Auth::user()->username)
                                ->where('status','=', 0)
                                ->count();
        }
        foreach ($cektiket as $value) {
            
            if($cektiket){
                //cek apakah sudah ada penilaian ?
                $cekrating = Rating::where('id_ticket', '=', $value->idTiket)->first();
                if(empty($cekrating)){
                    $data = Tiket::where('idTiket','=',$value->idTiket)->first();

                    return view('index', compact('data','jumlah_tiket','onprogress','done_tiket'));
                }
            }
        }
            return view('index', compact('data','jumlah_tiket','onprogress','done_tiket'));
        }
        return redirect('/')->with('message','Email atau Password salah!');
    }

    public function logout(Request $request)
    {
        // $request->session()->flush();
        // Auth::logout();
        // return redirect('/');
    }
}

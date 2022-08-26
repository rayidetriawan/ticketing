<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use Illuminate\Support\Carbon;

class TestController extends Controller
{
    //
    public function index()
    {
        $data = Barang::paginate(3);

        return view('test.index', compact('data'));
    }

    public function tambah()
    {
        return view('test.tambah');
    }

    public function simpan(Request $request)
    {
        $this->_validation($request);
        $data = [
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s')
        ];

        Barang::insert($data);

        return redirect()->route('crudindex')->with('message','Data Berhasil Disimpan!');
    }

    public function edit($id)
    {
        $data = Barang::where('id', $id)->first();
        
        return view('test.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->_validation($request);
        $data = [
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang, 
            'updated_at' => date('Y-m-d H:i:s')
        ];

        Barang::where('id', $id)->update($data);

        return redirect()->route('crudindex')->with('message','Data Berhasil Diubah!');
    }

    private function _validation(Request $request){
        $validate = $request->validate([
            'kode_barang' => 'required|max:5|min:2',
            'nama_barang' => 'required|max:50|min:3'
        ],
        [
            'kode_barang.required' => 'Bidang ini tidak boleh kosong !',
            'kode_barang.max' => 'Maksimal 5 Karakter!',
            'kode_barang.min' => 'Minimal 2 Karakter!',

            'nama_barang.required' => 'Bidang ini tidak boleh kosong!',
            'nama_barang.max' => 'Maksimal 50 Karakter!',
            'nama_barang.min' => 'Minimal 3 Karakter!',
        ]);
    }

    public function hapus($id)
    {
        Barang::where('id', $id)->delete();

        return redirect()->back()->with('message','Data Berhasil Dihapus!');
    }
}

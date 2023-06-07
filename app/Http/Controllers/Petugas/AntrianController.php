<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Loket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AntrianController extends Controller
{
    public function index()
    {
        $lokets = Loket::get();
        $users = User::where('role', 'petugas')->get();
        $abjad = range('A', 'E');

        return view('admin.loket.index', compact('lokets', 'users', 'abjad'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'kode' => 'required|unique:lokets',
            'petugas_id' => 'required',
        ], [
            'nama.required' => 'Nama loket tidak boleh kosong!',
            'kode.required' => 'Kode tidak boleh kosong!',
            'kode.unique' => 'Kode sudah digunakan!',
            'petugas_id.required' => 'Petugas harus dipilih!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        Loket::create(array_merge($request->all(), [
            'password' => bcrypt($request->password),
            'role' => 'petugas'
        ]));

        return back()->with('success', 'Berhasil menambahkan Loket');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'kode' => 'required|unique:lokets,kode,' . $id,
            'petugas_id' => 'required',
        ], [
            'nama.required' => 'Nama loket tidak boleh kosong!',
            'kode.required' => 'Kode tidak boleh kosong!',
            'kode.unique' => 'Kode sudah digunakan!',
            'petugas_id.required' => 'Petugas harus dipilih!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        Loket::where('id', $id)->update([
            'nama' => $request->nama,
            'kode' => $request->kode,
            'petugas_id' => $request->petugas_id
        ]);

        return back()->with('success', 'Berhasil menambahkan Loket');
    }

    public function destroy($id)
    {
        Loket::where('id', $id)->delete();

        return back()->with('success', 'Berhasil menghapus Loket');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PetugasController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'petugas')->get();

        return view('admin.petugas.index', compact('users'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
        ], [
            'nama.required' => 'Nama petugas tidak boleh kosong!',
            'username.required' => 'Username tidak boleh kosong!',
            'username.unique' => 'Username sudah digunakan!',
            'password.required' => 'Password tidak boleh kosong!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        User::create(array_merge($request->all(), [
            'password' => bcrypt($request->password),
            'role' => 'petugas'
        ]));

        return back()->with('success', 'Berhasil menambahkan Petugas');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'username' => 'required|unique:users,username,' . $id,
        ], [
            'nama.required' => 'Nama petugas tidak boleh kosong!',
            'username.required' => 'Username tidak boleh kosong!',
            'username.unique' => 'Username sudah digunakan!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        User::where('id', $id)->update([
            'nama' => $request->nama,
            'username' => $request->username,
        ]);

        return back()->with('success', 'Berhasil menambahkan Petugas');
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return back()->with('success', 'Berhasil menghapus Petugas');
    }

    public function reset_password($id)
    {
        User::where('id', $id)->update([
            'password' => bcrypt('12345678')
        ]);

        return back()->with('success', 'Berhasil mereset password Petugas');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Model\HakAkses;
use App\Models\User;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function index()
    {
        $data = [
            "data_akun" => User::all(),
            "data_hak_akses" => HakAkses::orderBy("nama_hak_akses", "DESC")->get()
        ];

        return view("admin/page/pengaturan/akun/index", $data);
    }

    public function store(Request $request)
    {

        $validasi = $request->validate([
            "name" => "required",
            "username" => "required",
            "email" => "required|unique:users",
            "hak_akses_id" => "required",
            "gambar" => "image|file|max:1024"
        ]);

        if ($request->gambar) {
            $validasi['gambar'] = $request->file("gambar")->store("akun");
        }

        $validasi["password"] = bcrypt($request->password);

        User::create($validasi);

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil Ditambahkan', 'success')</script>");
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => User::where("id", $request->id)->first(),
            "data_hak_akses" => HakAkses::orderBy("nama_hak_akses", "DESC")->get()
        ];

        return view("admin/page/akun/edit", $data);
    }

    public function update(Request $request)
    {
        $validasi = $request->validate([
            "name" => "required",
            "username" => "required",
            "hak_akses_id" => "required",
        ]);

        $akunCek = User::where('id', $request->id)->first();

        if ($akunCek) {
            if (password_verify($request->password, $akunCek->password)) {
                if ($request->gambar) {
                    $validasi['gambar'] = $request->file("gambar")->store("akun");
                }

                $validasi["password"] = bcrypt($request->password);

                User::where('id', $request->id)->update($validasi);

                return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil Diubah', 'success')</script>");
            } else {
                return back()->with('message', "<script>swal('Ooops!', 'Password anda salah!', 'error')</script>");
            }
        } else {
            return back()->with('message', "<script>swal('Ooops!', 'Data Gagal Diubah', 'error')</script>");
        }
    }

    public function destroy($id)
    {
        $cek = User::where('id', $id)->first();

        unlink('storage/'.$cek->gambar);

        User::where('id', $cek->id)->delete();

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil Dihapus', 'success')</script>");
    }
}

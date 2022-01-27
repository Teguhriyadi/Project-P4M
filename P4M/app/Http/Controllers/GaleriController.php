<?php

namespace App\Http\Controllers;

use App\Models\Model\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $data = [
            "data_galeri" => Galeri::latest()->get()
        ];

        return view("/admin/page/web/galeri/index", $data);
    }

    public function store(Request $request)
    {
        $cek = Galeri::where("judul", $request->judul)->count();

        if ($cek) {
            return redirect()->back()->with('message', "<script>swal('Oops!', 'Tidak Boleh Duplikasi Data', 'error')</script>");
        } else {
            $validasi = $request->validate([
                "judul" => "required",
                "gambar" => "image|file"
            ]);

            if ($request->file("gambar")) {
                $validasi["gambar"] = $request->file("gambar")->store("galeri");
            }

            Galeri::create($validasi);

            return redirect()->back()->with('message', "<script>swal('Selamat!', 'Data Berhasil ditambahkan', 'success')</script>");
        }
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Galeri::where("id", $request->id)->first()
        ];

        return view("admin/page/web/galeri/edit", $data);
    }

    public function update(Request $request, Galeri $galeri)
    {
        $validasi = $request->validate([
            "judul" => "required",
            "gambar" => "image|file|max:1024"
        ]);

        if ($request->file("gambar")) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validasi["gambar"] = $request->file("gambar")->store("galeri");
        }

        Galeri::where("id", $request->id)->update($validasi);

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil Diubah', 'success')</script>");
    }

    public function destroy(Request $request, $id)
    {
        if ($request->gambar) {
            Storage::delete($request->gambar);
        }

        Galeri::where("id", $id)->delete();

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil Dihapus', 'success')</script>");
    }
}

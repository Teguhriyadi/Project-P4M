<?php

namespace App\Http\Controllers;

use App\Models\Model\Sejarah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SejarahController extends Controller
{
    public function index()
    {
        $sejarah = Sejarah::first();
        return view('admin.page.info.sejarah.index', compact('sejarah'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "sejarah" => "required",
            "gambar" => "image|file|max:1024"
        ]);

        if($request->file("gambar")) {
            $validatedData["gambar"] = $request->file('gambar')->store('sejarah');
        }

        Sejarah::create($validatedData);

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Tambahkan', 'success')</script>");
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            "sejarah" => "required",
            "gambar" => "image|file|max:1024"
        ]);

        if ($request->file("gambar")) {

            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validasi["gambar"] = $request->file("gambar")->store("profil");

        }

        Sejarah::where("id", $id)->update($validasi);

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Ubah', 'success')</script>");
    }
}

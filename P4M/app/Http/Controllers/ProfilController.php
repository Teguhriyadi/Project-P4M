<?php

namespace App\Http\Controllers;

use App\Models\Model\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function index()
    {
        $data = [
            "data_profil" => Profil::orderBy("created_at", "DESC")->paginate(1)
        ];

        return view("admin/page/profil/index", $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "deskripsi" => "required",
            "gambar" => "image|file|max:1024"
        ]);

        if($request->file("gambar")) {
            $validatedData["gambar"] = $request->file('gambar')->store('profil');
        }

        Profil::create($validatedData);

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            "deskripsi" => "required",
            "gambar" => "image|file|max:1024"
        ]);

        if ($request->file("gambar")) {

            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validasi["gambar"] = $request->file("gambar")->store("profil");

        }

        Profil::where("id", $id)->update($validasi);

        return back();
    }
}

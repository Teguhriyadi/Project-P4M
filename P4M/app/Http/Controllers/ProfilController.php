<?php

namespace App\Http\Controllers;

use App\Models\Model\Alamat;
use App\Models\Model\Geografis;
use App\Models\Model\Profil;
use App\Models\Model\TeksBerjalan;
use App\Models\Model\VisiMisi;
use App\Models\Model\WilayahGeografis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function index()
    {
        $data = [
            "data_profil" => Profil::orderBy("created_at", "DESC")->paginate(1),
            "data_geografis" => Geografis::orderBy("id", "DESC")->paginate(1),
            "data_wilayah" => WilayahGeografis::orderBy("batas", "DESC")->get(),
            "data_visi_misi" => VisiMisi::orderBy("created_at", "DESC")->paginate(1),
            "data_alamat" => Alamat::orderBy("created_at", "DESC")->paginate(1),
            "data_teks_berjalan" => TeksBerjalan::orderBy("created_at", "DESC")->paginate(1)
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

        return back()->with('message', "<script>swal('Selamat!', 'Profil desa berhasil dirubah', 'success')</script>");
    }
}

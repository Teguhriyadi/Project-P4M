<?php

namespace App\Http\Controllers;

use App\Models\Model\Berita;
use App\Models\Model\Galeri;
use App\Models\Model\Kontak;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view("/pengunjung/page/home");
    }

    public function berita()
    {
        $data = [
            "data_berita" => Berita::all()
        ];

        return view("/pengunjung/page/berita", $data);
    }

    public function galeri()
    {
        $data = [
            "data_galeri" => Galeri::orderBy("created_at", "DESC")->get()
        ];

        return view("/pengunjung/page/galeri", $data);
    }

    public function kontak()
    {
        return view("/pengunjung/page/kontak");
    }

    public function kirim_pesan(Request $request)
    {
        Kontak::create($request->all());

        return redirect()->back();
    }
}

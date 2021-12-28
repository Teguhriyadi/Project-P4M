<?php

namespace App\Http\Controllers;

use App\Models\Model\Berita;
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
        return view("/pengunjung/page/galeri");
    }

    public function kontak()
    {
        return view("/pengunjung/page/kontak");
    }
}

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
        $data = [
            "data_berita" => Berita::orderBy("created_at", "DESC")->paginate(3),
            "data_galeri" => Galeri::orderBy("created_at", "DESC")->paginate(3)
        ];

        return view("/pengunjung/page/home", $data);
    }

    public function berita()
    {
        $data = [
            "data_berita" => Berita::paginate(6)
        ];

        return view("/pengunjung/page/berita/index", $data);
    }

    public function detailBerita($slug)
    {
        $data = [
<<<<<<< HEAD
            "detail" => Berita::where("slug", $slug)->first()
        ];

=======
            "berita" => Berita::where("slug", $slug)->first()
        ];
>>>>>>> be9a100be186ff5a95aa947db6076b0d3b03d3cf
        return view("/pengunjung/page/berita/detail", $data);
    }

    public function galeri()
    {
        $data = [
            "data_galeri" => Galeri::orderBy("created_at", "DESC")->paginate(6)
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

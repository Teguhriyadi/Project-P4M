<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view("/pengunjung/page/home");
    }

    public function berita()
    {
        return view("/pengunjung/page/berita");
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

<?php

namespace App\Http\Controllers;

use App\Models\Model\Berita;
use App\Models\Model\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "data_berita" => Berita::all(),
            "data_kategori" => Kategori::orderBy("nama", "ASC")->get()
        ];

        return view("admin/page/berita/index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            "data_kategori" => Kategori::orderBy("nama", "ASC")->get()
        ];

        return view("admin/page/berita/form_tambah", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "judul" => "required|max:255",
            "slug" => "required|unique:tb_berita",
            "kategori_id" => "required",
            "image" => "image|file|max:1024",
            "body" => "required"
        ]);

        if($request->file("image")) {
            $validatedData["image"] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['kutipan'] = Str::limit(strip_tags($request->body, 200));

        Berita::create($validatedData);

        return redirect("/page/admin/berita");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Model\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Model\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $berita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita $berita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $berita)
    {
        //
    }
}

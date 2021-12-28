<?php

namespace App\Http\Controllers;

use App\Models\Model\Kategori;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class KategoriController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $data = [
            "data_kategori" => Kategori::all()
        ];

        return view("/admin/page/kategori/index", $data);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        Kategori::create($request->all());

        return redirect()->back();
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Model\Kategori  $kategori
    * @return \Illuminate\Http\Response
    */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Model\Kategori  $kategori
    * @return \Illuminate\Http\Response
    */
    public function edit(Kategori $kategori)
    {
        $data = [
            "edit" => Kategori::where("id", $kategori->id)->first(),
            "data_kategori" => Kategori::where("id","!=" ,$kategori->id)->get()
        ];

        return view("/admin/page/kategori/edit", $data);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Model\Kategori  $kategori
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Kategori $kategori)
    {
        Kategori::where("id", $kategori->id)->update([
            "nama" => $request->nama,
            "slug" => $request->slug
        ]);

        return redirect("/page/admin/kategori");
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Model\Kategori  $kategori
    * @return \Illuminate\Http\Response
    */
    public function destroy(Kategori $kategori)
    {
        Kategori::where('id', $kategori->id)->delete();

        return redirect()->back();
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Kategori::class, 'slug', $request->nama);

        return response()->json(['slug' => $slug]);
    }
}
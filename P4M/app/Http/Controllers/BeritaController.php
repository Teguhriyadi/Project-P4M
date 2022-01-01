<?php

namespace App\Http\Controllers;

use App\Models\Model\Berita;
use App\Models\Model\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $data = [
            "data_berita" => Berita::all(),
            "data_kategori" => Kategori::orderBy("nama", "ASC")->get()
        ];

        return view("admin/page/berita/index", $data);
    }

    public function create()
    {
        $data = [
            "data_kategori" => Kategori::orderBy("nama", "ASC")->get()
        ];

        return view("admin/page/berita/form_tambah", $data);
    }

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
            $validatedData["image"] = $request->file('image')->store('berita');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['kutipan'] = Str::limit(strip_tags($request->body, 200));

        Berita::create($validatedData);

        return redirect("/page/admin/berita")->with('message', "<script>swal('Selamat!', 'Data anda berhasil ditambahkan', 'success')</script>");
    }

    public function show(Berita $berita)
    {
        //
    }

    public function edit($slug)
    {
        $data = [
            "data_kategori" => Kategori::orderBy("nama", "DESC")->get(),
            "edit" => Berita::where("slug", $slug)->first()
        ];

        return view("admin/page/berita/form_edit", $data);
    }

    public function update(Request $request, $slug)
    {
        $validatedData = $request->validate([
            "judul" => "required|max:255",
            "slug" => "required|unique:tb_berita",
            "kategori_id" => "required",
            "image" => "image|file|max:1024",
            "body" => "required"
        ]);

        if($request->file("image")) {

            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validatedData["image"] = $request->file('image')->store('berita');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['kutipan'] = Str::limit(strip_tags($request->body, 200));

        Berita::where("slug", $slug)->update($validatedData);

        return redirect("/page/admin/berita")->with('message', "<script>swal('Selamat!', 'Data anda berhasil ditambahkan', 'success')</script>");
    }

    public function destroy(Berita $berita)
    {

    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Berita::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}

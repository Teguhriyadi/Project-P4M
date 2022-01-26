<?php

namespace App\Http\Controllers;

use App\Models\Model\Artikel;
use App\Models\Model\Kategori;
use App\Models\Model\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index()
    {
        $data = [
            "data_artikel" => Artikel::all(),
            "data_kategori" => Kategori::orderBy("nama", "ASC")->get()
        ];

        return view("/admin/page/web/artikel/index", $data);
    }

    public function show($slug)
    {
        return $this->index();
    }

    public function create()
    {
        $data = [
            "data_kategori" => Kategori::orderBy("nama", "ASC")->get()
        ];

        return view("admin/page/web/artikel/form_tambah", $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "judul" => "required|max:255",
            "kategori_id" => "required",
            "image" => "image|file|max:1024",
            "body" => "required"
        ]);

        if($request->file("image")) {
            $validatedData["image"] = $request->file('image')->store('artikel');
        }

        $validatedData['slug'] = Str::slug($request->judul);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['kutipan'] = Str::limit(strip_tags($request->body, 1000));

        Artikel::create($validatedData);

        return redirect("/page/admin/web/artikel")->with('message', "<script>swal('Selamat!', 'Data Berhasil Ditambahkan', 'success')</script>");
    }

    public function edit($slug)
    {
        $data = [
            "data_kategori" => Kategori::orderBy("nama", "DESC")->get(),
            "edit" => Artikel::where("slug", $slug)->first()
        ];

        return view("/admin/page/web/artikel/form_edit", $data);
    }

    public function update(Request $request, $slug)
    {
        $validatedData = $request->validate([
            "judul" => "required|max:255",
            "kategori_id" => "required",
            "image" => "image|file|max:1024",
            "body" => "required"
        ]);

        if($request->file("image")) {

            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validatedData["image"] = $request->file('image')->store('artikel');
        }

        $validatedData['slug'] = Str::slug($request->judul);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['kutipan'] = Str::limit(strip_tags($request->body, 200));

        Artikel::where("slug", $slug)->update($validatedData);

        return redirect("/page/admin/web/artikel")->with('message', "<script>swal('Selamat!', 'Data Berhasil Diubah', 'success')</script>");
    }

    public function destroy(Request $request, $id)
    {
        if ($request->image) {
            Storage::delete($request->image);
        }

        Artikel::where("id", $id)->delete();

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil Dihapus', 'success')</script>");
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(artikel::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }

    public function komentar($slug)
    {
        $artikel = Artikel::where('slug', $slug)->first();

        if ($artikel) {
            $komentar = Komentar::where('id_artikel', $artikel->id)->get();

            return view('admin.page.web.artikel.komentar', compact('komentar', 'artikel'));
        } else {
            abort(404);
        }
    }

    public function komentarHapus($slug, $id)
    {
        Komentar::where('id', $id)->delete();

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil Dihapus', 'success')</script>");
    }
}

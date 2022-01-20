<?php

namespace App\Http\Controllers;

use App\Models\Model\Sejarah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SejarahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sejarah = Sejarah::first();
        return view('admin.page.info.sejarah.index', compact('sejarah'));
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
        $validatedData = $request->validate([
            "sejarah" => "required",
            "gambar" => "image|file|max:1024"
        ]);

        if($request->file("gambar")) {
            $validatedData["gambar"] = $request->file('gambar')->store('sejarah');
        }

        Sejarah::create($validatedData);

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Tambahkan', 'success')</script>");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Model\Sejarah  $sejarah
     * @return \Illuminate\Http\Response
     */
    public function show(Sejarah $sejarah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Model\Sejarah  $sejarah
     * @return \Illuminate\Http\Response
     */
    public function edit(Sejarah $sejarah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model\Sejarah  $sejarah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            "sejarah" => "required",
            "gambar" => "image|file|max:1024"
        ]);

        if ($request->file("gambar")) {

            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validasi["gambar"] = $request->file("gambar")->store("profil");

        }

        Sejarah::where("id", $id)->update($validasi);

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Ubah', 'success')</script>");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model\Sejarah  $sejarah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sejarah $sejarah)
    {
        //
    }
}

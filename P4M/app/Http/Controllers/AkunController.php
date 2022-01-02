<?php

namespace App\Http\Controllers;

use App\Models\Model\HakAkses;
use App\Models\User;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function index()
    {
        $data = [
            "data_akun" => User::all(),
            "data_hak_akses" => HakAkses::orderBy("nama_hak_akses", "DESC")->get()
        ];

        return view("admin/page/akun/index", $data);
    }

    public function store(Request $request)
    {

        $validasi = $request->validate([
            "name" => "required",
            "username" => "required",
            "email" => "required|unique:users",
            "hak_akses_id" => "required",
            "gambar" => "image|file|max:1024"
        ]);

        if ($request->gambar) {
            $validasi['gambar'] = $request->file("gambar")->store("akun");
        }

        $validasi["password"] = bcrypt($request->password);

        User::create($validasi);

        return back()->with('message', "<script>swal('Selamat!', 'Data anda berhasil ditambahkan', 'success')</script>");
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => User::where("id", $request->id)->first()
        ];

        return view("admin/page/akun/edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}

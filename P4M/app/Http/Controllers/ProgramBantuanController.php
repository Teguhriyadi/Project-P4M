<?php

namespace App\Http\Controllers;

use App\Models\Model\Keluarga;
use App\Models\Model\ProgramBantuan;
use Illuminate\Http\Request;

class ProgramBantuanController extends Controller
{
    public function index()
    {
        $data = [
            "data_program_bantuan" => ProgramBantuan::all()
        ];

        return view("/admin/page/program_bantuan/data_program_bantuan", $data);
    }

    public function create()
    {
        return view("/admin/page/program_bantuan/form_tambah_program_bantuan");
    }

    public function store(Request $request)
    {
        ProgramBantuan::create([
            "nama" => $request->nama,
            "sasaran" => $request->sasaran,
            "deskripsi" => $request->deskripsi,
            "tanggal_mulai" => $request->tanggal_mulai,
            "tanggal_berakhir" => $request->tanggal_berakhir,
            "user_id" => auth()->user()->id,
            "status" => $request->status,
            "asal_dana" => $request->asal_dana
        ]);

        return redirect("/page/admin/program_bantuan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Model\ProgramBantuan  $programBantuan
     * @return \Illuminate\Http\Response
     */
    public function show(ProgramBantuan $programBantuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Model\ProgramBantuan  $programBantuan
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgramBantuan $programBantuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model\ProgramBantuan  $programBantuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProgramBantuan $programBantuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model\ProgramBantuan  $programBantuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgramBantuan $programBantuan)
    {
        //
    }

    public function rincian_bantuan($id)
    {
        $data = [
            "detail" => ProgramBantuan::where("id", $id)->first()
        ];

        return view("/admin/page/program_bantuan/rincian_bantuan", $data);
    }

    public function tambah_peserta($id)
    {
        $data = [
            "detail" => ProgramBantuan::where("id", $id)->first(),
            "data_keluarga" => Keluarga::all()
        ];

        return view("/admin/page/program_bantuan/tambah_peserta", $data);
    }
}

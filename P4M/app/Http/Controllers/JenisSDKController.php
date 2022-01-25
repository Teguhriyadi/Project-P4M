<?php

namespace App\Http\Controllers;

use App\Models\Model\JenisSDK;
use App\Models\Model\Tahun;
use Illuminate\Http\Request;

class JenisSDKController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $daya_kelembagaan = JenisSDK::all();
        return view('admin.page.sumber_daya.kelembagaan.index', compact('daya_kelembagaan'));
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
        $ambil = Tahun::where("status", "1")->first();

        JenisSDK::create([
            "jenis_organisasi" => $request->jenis_organisasi,
            "jumlah_anggota" => $request->jumlah_anggota,
            "lokasi" => $request->lokasi_sdk,
        ]);

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Tambahkan', 'success')</script>");
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Model\JenisSDK  $jenisSDK
    * @return \Illuminate\Http\Response
    */
    public function show(JenisSDK $jenisSDK)
    {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Model\JenisSDK  $jenisSDK
    * @return \Illuminate\Http\Response
    */
    public function edit(Request $request)
    {
        $data = [
            "edit" => JenisSDK::where("id", $request->id)->first()
        ];

        return view("admin.page.sumber_daya.kelembagaan.edit", $data);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Model\JenisSDK  $jenisSDK
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request)
    {
        JenisSDK::where("id", $request->id)->update([
            "jenis_organisasi" => $request->jenis_organisasi,
            "jumlah_anggota" => $request->jumlah_anggota,
            "lokasi" => $request->lokasi_sdk
        ]);

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Ubah', 'success')</script>");
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Model\JenisSDK  $jenisSDK
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        JenisSDK::where("id", $id)->delete();

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Hapus', 'success')</script>");
    }
}

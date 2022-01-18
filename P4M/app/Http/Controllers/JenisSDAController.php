<?php

namespace App\Http\Controllers;

use App\Models\Model\JenisSDA;
use Illuminate\Http\Request;

class JenisSDAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daya_alam = JenisSDA::all();
        return view('admin.page.sumber_daya.alam.index', compact('daya_alam'));
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
        JenisSDA::create($request->all());

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Tambahkan', 'success')</script>");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Model\JenisSDA  $jenisSDA
     * @return \Illuminate\Http\Response
     */
    public function show(JenisSDA $jenisSDA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Model\JenisSDA  $jenisSDA
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = [
            "edit" => JenisSDA::where("id", $request->id)->first()
        ];

        return view("admin.page.sumber_daya.alam.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model\JenisSDA  $jenisSDA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        JenisSDA::where("id", $request->id)->update([
            "jenis" => $request->jenis,
            "luas" => $request->luas,
            "lokasi" => $request->lokasi
        ]);

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Ubah', 'success')</script>");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model\JenisSDA  $jenisSDA
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JenisSDA::where("id", $id)->delete();

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Hapus', 'success')</script>");
    }
}

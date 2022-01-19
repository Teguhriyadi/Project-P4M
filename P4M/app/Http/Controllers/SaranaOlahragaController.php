<?php

namespace App\Http\Controllers;

use App\Models\Model\SaranaOlahraga;
use Illuminate\Http\Request;

class SaranaOlahragaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $olahraga = SaranaOlahraga::all();
        return view('admin.page.sarana.olahraga.index', compact('olahraga'));
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
        SaranaOlahraga::create($request->all());

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Tambahkan', 'success')</script>");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $edit = SaranaOlahraga::where('id', $request->id)->first();

        return view('admin.page.sarana.olahraga.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        SaranaOlahraga::where('id', $request->id)->update([
            'jenis' => $request->jenis,
            'jumlah' => $request->jumlah,
            'lokasi' => $request->lokasi,
        ]);

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Ubah', 'success')</script>");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SaranaOlahraga::where('id', $id)->delete();
        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Hapus', 'success')</script>");
    }
}

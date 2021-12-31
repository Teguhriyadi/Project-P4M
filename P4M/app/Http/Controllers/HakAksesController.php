<?php

namespace App\Http\Controllers;

use App\Models\Model\HakAkses;
use Illuminate\Http\Request;

class HakAksesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "data_hak_akses" => HakAkses::orderBy("nama_hak_akses", "DESC")->get()
        ];

        return view("admin/page/hak_akses/index", $data);
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
        HakAkses::create($request->all());

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Model\HakAkses  $hakAkses
     * @return \Illuminate\Http\Response
     */
    public function show(HakAkses $hakAkses)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Model\HakAkses  $hakAkses
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            "edit" => HakAkses::where("id", $id)->first(),
            "data_hak_akses" => HakAkses::where("id", "!=", $id)->orderBy("nama_hak_akses", "DESC")->get()
        ];

        return view("/admin/page/hak_akses/edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model\HakAkses  $hakAkses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        HakAkses::where("id", $id)->update([
            "nama_hak_akses" => $request->nama_hak_akses
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model\HakAkses  $hakAkses
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HakAkses::where("id", $id)->delete();

        return back();
    }
}

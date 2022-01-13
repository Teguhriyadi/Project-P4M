<?php

namespace App\Http\Controllers;

use App\Models\Model\SyaratSurat;
use Illuminate\Http\Request;

class SyaratSuratController extends Controller
{
    public function index()
    {
        $data = [
            "data_syarat_surat" => SyaratSurat::orderBy("syarat_nama", "DESC")->get()
        ];

        return view("/admin/page/surat/syarat/data_syarat_surat", $data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Model\SyaratSurat  $syaratSurat
     * @return \Illuminate\Http\Response
     */
    public function show(SyaratSurat $syaratSurat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Model\SyaratSurat  $syaratSurat
     * @return \Illuminate\Http\Response
     */
    public function edit(SyaratSurat $syaratSurat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model\SyaratSurat  $syaratSurat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SyaratSurat $syaratSurat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model\SyaratSurat  $syaratSurat
     * @return \Illuminate\Http\Response
     */
    public function destroy(SyaratSurat $syaratSurat)
    {
        //
    }
}

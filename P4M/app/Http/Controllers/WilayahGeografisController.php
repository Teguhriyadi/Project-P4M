<?php

namespace App\Http\Controllers;

use App\Models\Model\WilayahGeografis;
use Illuminate\Http\Request;

class WilayahGeografisController extends Controller
{
    public function store(Request $request)
    {
        WilayahGeografis::create($request->all());

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Model\WilayahGeografis  $wilayahGeografis
     * @return \Illuminate\Http\Response
     */
    public function show(WilayahGeografis $wilayahGeografis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Model\WilayahGeografis  $wilayahGeografis
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = [
            "edit" => WilayahGeografis::where("id", $request->id)->first()
        ];

        return view("admin/page/profil/edit", $data);
    }

    public function update(Request $request, WilayahGeografis $wilayahGeografis)
    {
        WilayahGeografis::where("id", $request->id)->update([
            "geografis_id" => $request->geografis_id,
            "batas" => $request->batas,
            "desa" => $request->desa,
            "kecamatan" => $request->kecamatan
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model\WilayahGeografis  $wilayahGeografis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        WilayahGeografis::where("id", $id)->delete();

        return back();
    }
}

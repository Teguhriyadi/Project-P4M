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

    public function destroy($id)
    {
        WilayahGeografis::where("id", $id)->delete();

        return back();
    }
}

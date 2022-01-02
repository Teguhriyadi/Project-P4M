<?php

namespace App\Http\Controllers;

use App\Models\Model\RtRw;
use Illuminate\Http\Request;

class RtRwController extends Controller
{
    public function index()
    {
        $data = [
            "data_rt_rw" => RtRw::orderBy("dusun", "ASC")->get()
        ];

        return view("admin/page/rt_rw/index", $data);
    }

    public function store(Request $request)
    {
        RtRw::create([
            "dusun" => $request->dusun,
            "tahun" => $request->tahun,
            "laki_laki" => $request->laki_laki,
            "perempuan" => $request->perempuan,
            "jumlah" => $request->laki_laki + $request->perempuan
        ]);

        return back();
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => RtRw::where("id", $request->id)->first()
        ];

        return view("admin/page/rt_rw/edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model\RtRw  $rtRw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        RtRw::where("id", $request->id)->update([
            "dusun" => $request->dusun,
            "tahun" => $request->tahun,
            "laki_laki" => $request->laki_laki,
            "perempuan" => $request->perempuan,
            "jumlah" => $request->laki_laki + $request->perempuan
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model\RtRw  $rtRw
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RtRw::where("id", $id)->delete();

        return back();
    }
}

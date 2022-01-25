<?php

namespace App\Http\Controllers;

use App\Models\Model\Keluarga;
use App\Models\model\Penduduk;
use App\Models\Model\RTM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RtmController extends Controller
{
    public function index()
    {
        $data = [
            "data_penduduk" => Penduduk::where("id_rtm", NULL)->get(),
            "data_rtm" => RTM::all()
        ];

        return view("admin.page.kependudukan.rtm.data_rtm", $data);
    }

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
        $ambil = Keluarga::where("nik_kepala" , $request->nik_kepala)->first();

        Penduduk::where("id", $request->nik_kepala)->update([
            "id_rtm" => $ambil->no_kk,
            "rtm_level" => 1
        ]);

        RTM::create([
            "nik_kepala" => $request->nik_kepala,
            "no_kk" => $ambil->no_kk,
            "kelas_sosial" => 1
        ]);

        return redirect("/page/admin/kependudukan/rtm");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Model\RTM  $rTM
     * @return \Illuminate\Http\Response
     */
    public function show(RTM $rTM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Model\RTM  $rTM
     * @return \Illuminate\Http\Response
     */
    public function edit(RTM $rTM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model\RTM  $rTM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RTM $rTM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model\RTM  $rTM
     * @return \Illuminate\Http\Response
     */
    public function destroy(RTM $rTM)
    {
        //
    }

    public function rincian_rtm($id)
    {
        $data = [
            "edit" => RTM::where("id", $id)->first()
        ];

        if (!$data["edit"]) {
            abort(404);
        }

        return view("/admin/page/kependudukan/rtm/rincian_rtm", $data);
    }

    public function tambah_data_anggota_rtm(Request $request)
    {
        $data = [
            "edit" => RTM::where("id", $request->id)->first()
        ];

        return view("/admin/page/kependudukan/rtm/tambah_data_anggota_rtm", $data);
    }

    public function tambah_data_anggota(Request $request)
    {
        $ambil = Keluarga::where("id", $request->nik_kepala)->first();

        Penduduk::where("id", $request->nik_kepala)->update([
            "id_rtm" => $ambil->no_kk,
            "rtm_level" => 2
        ]);

        return redirect("/page/admin/kependudukan/rtm");

    }

    public function tambah_anggota_rumah_tangga(Request $request)
    {
        $data = [
            "detail" => RTM::where("id", $request->id)->first()
        ];

        return view("/admin/page/kependudukan/rtm/tambah_anggota_rumah_tangga", $data);
    }

    public function simpan_data_anggota_rumah_tangga(Request $request)
    {
        Penduduk::where("id", $request->nik)->update([
            "id_rtm" => $request->no_kk,
            "rtm_level" => 2
        ]);

        return back();
    }

    public function kartu_rtm($id)
    {
        $data = [
            "detail" => RTM::where("id", $id)->first()
        ];

        return view("/admin/page/kependudukan/rtm/kartu_rtm", $data);
    }

    public function cetak_rtm($id)
    {
        $data = [
            "detail" => RTM::where("id", $id)->first()
        ];
        return view("/admin/page/kependudukan/rtm/cetak_rtm", $data);
    }

}

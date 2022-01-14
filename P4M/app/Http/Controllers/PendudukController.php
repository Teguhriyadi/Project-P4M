<?php

namespace App\Http\Controllers;

use App\Models\Model\Rt;
use App\Models\Model\Rw;
use App\Models\Model\Dusun;
use App\Models\Model\Penduduk;
use App\Models\Model\PendudukSex;
use App\Models\Model\PendudukAgama;
use App\Models\Model\PendudukHubungan;
use App\Models\Model\PendudukKawin;
use App\Models\Model\GolonganDarah;
use App\Models\Model\PendudukPendidikan;
use App\Models\Model\PendudukPekerjaan;
use App\Models\Model\PendudukWargaNegara;

use Illuminate\Http\Request;

class PendudukController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $data = [
            "penduduk" => Penduduk::all()
        ];
        
        return view("admin/page/penduduk/index", $data);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $data = [
            "data_hubungan" => PendudukHubungan::all(),
            "data_kelamin" => PendudukSex::all(),
            "data_agama" => PendudukAgama::all(),
            "data_pendidikan" => PendudukPendidikan::all(),
            "data_pekerjaan" => PendudukPekerjaan::all(),
            "data_warganegara" => PendudukWargaNegara::all(),
            "data_kawin" => PendudukKawin::all(),
            "data_darah" => GolonganDarah::all(),
            "data_dusun" => Dusun::all(),
            "data_rt" => Rt::all(),
            "data_rw" => Rw::all(),
        ];
        
        return view("admin/page/penduduk/create", $data);
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "nik" => "required|max:20",
            "nama" => "required",
            "kk_sebelumnya" => "required|max:20",
            "id_hubungan" => "required",
            "id_sex" => "required",
            "id_agama" => "required",
            "tempat_lahir" => "required",
            "tgl_lahir" => "required",
            "waktu_lahir" => "required",
            "kelahiran_ke" => "required",
            "jumlah_saudara" => "required",
            "berat_lahir" => "required",
            "panjang_lahir" => "required",
            "id_pendidikan" => "required",
            "id_pekerjaan" => "required",
            "id_warga_negara" => "required",
            "nik_ayah" => "required|max:20",
            "nik_ibu" => "required|max:20",
            "nama_ayah" => "required",
            "nama_ibu" => "required",
            "status_kawin" => "required",
            "id_rt" => "required",
            "id_rw" => "required",
            "id_dusun" => "required",
        ]);

        $validatedData["status_hidup"] = 1;

        Penduduk::create($validatedData);

        return redirect('/page/admin/kependudukan/penduduk')->with('message', "<script>swal('Selamat!', 'Data anda berhasil ditambahkan', 'success')</script>");;
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $penduduk = Penduduk::first('id', $id)->first();

        return view('admin/page/penduduk/show', compact('penduduk'));
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        //
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        //
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        //
    }
}

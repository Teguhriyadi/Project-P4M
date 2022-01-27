<?php

namespace App\Http\Controllers;

use App\Models\Model\KlasifikasiSurat;
use App\Models\Model\Penduduk;
use App\Models\Model\PermohonanSurat;
use App\Models\Model\SuratFormat;
use App\Models\Model\SyaratSurat;
use Illuminate\Http\Request;

class SuratOnlineController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $surat = SuratFormat::all();
        return view('pengunjung.page.surat.index', compact('surat'));
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
        PermohonanSurat::create([
            'nik' => $request->id_penduduk,
            'telepon' => $request->telepon,
            'id_surat' => $request->id_surat,
            'kebutuhan' => $request->kebutuhan,
        ]);

        return back()->with('message', "<script>swal('Selamat!', 'Data anda berhasil dikirm', 'success')</script>");
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $surat = SyaratSurat::where("surat_format_id", $id)->get();

        // foreach ($surat as $s) {
        //     # code...
        // }

        return view('pengunjung.page.surat.syarat', compact('surat'));
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

    public function penduduk()
    {
        if ($_GET['search']) {
            $penduduk = Penduduk::where('nama', 'like', '%'.$_GET['search'].'%')->orderBy('nama', 'asc')->get();
        } else {
            $penduduk = Penduduk::orderBy('nama', 'asc')->get();
        }

        $data = array();
        $key = 0;

        foreach ($penduduk as $p) {
            $data[] = array(
                'id' => $p->id,
                'text' => $p->nama
            );
        }

        return response()->json($data);
    }
}

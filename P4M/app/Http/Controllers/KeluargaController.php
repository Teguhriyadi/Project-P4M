<?php

namespace App\Http\Controllers;

use App\Models\Model\Keluarga;
use Illuminate\Http\Request;

class KeluargaController extends Controller
{
    public function index()
    {
        return view("/admin/page/kependudukan/keluarga/data_keluarga");
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Keluarga $keluarga)
    {
        //
    }

    public function edit(Keluarga $keluarga)
    {
        //
    }

    public function update(Request $request, Keluarga $keluarga)
    {
        //
    }

    public function destroy(Keluarga $keluarga)
    {
        //
    }

    public function form_tambah_penduduk_masuk()
    {
        return view("/admin/page/kependudukan/keluarga/form_tambah_penduduk_masuk");
    }
}

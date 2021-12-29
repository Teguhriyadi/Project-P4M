<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\TemplateSurat;

class TemplateSuratController extends Controller
{
    public function index()
    {
        return view("/admin/page/template_surat/index");
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $cek = TemplateSurat::create($request->all());

        if ($cek) {
            echo 1;
        } else {
            echo 2;
        }
    }

    public function show()
    {
        $template = TemplateSurat::all();

        $data = [];
        
        foreach ($template as $t) {
            $data[] = [
                'id' => $t['id'],
                'no_surat' => $t['no_surat'],
                'nama_surat' => $t['nama_surat'],
                'singkatan_surat' => $t['singkatan_surat'],
            ];
        }

        return response()->json($data);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $cek = TemplateSurat::where('id', $id)->delete();

        if ($cek) {
            echo 1;
        } else {
            echo 2;
        }
        
    }
}

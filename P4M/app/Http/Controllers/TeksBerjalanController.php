<?php

namespace App\Http\Controllers;

use App\Models\Model\TeksBerjalan;
use Illuminate\Http\Request;

class TeksBerjalanController extends Controller
{
    public function store(Request $request)
    {
        TeksBerjalan::create($request->all());

        return back();
    }

    public function update(Request $request, $id)
    {
        TeksBerjalan::where("id", $id)->update([
            "teks" => $request->teks
        ]);

        return back();
    }
}

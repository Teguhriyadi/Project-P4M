<?php

namespace App\Http\Controllers;

use App\Models\Model\Geografis;
use Illuminate\Http\Request;

class GeografisController extends Controller
{
    public function store(Request $request)
    {
        Geografis::create([
            "deskripsi" => $request->deskripsi_geografis
        ]);

        return back();
    }

    public function update(Request $request, $id)
    {
        Geografis::where("id", $id)->update([
            "deskripsi" => $request->deskripsi_geografis
        ]);

        return back();
    }
}

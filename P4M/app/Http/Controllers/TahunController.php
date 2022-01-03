<?php

namespace App\Http\Controllers;

use App\Models\Model\Tahun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TahunController extends Controller
{
    public function index()
    {
        $data = [
            "data_tahun" => Tahun::orderBy("tahun", "DESC")->get()
        ];

        return view("admin/page/tahun/index", $data);
    }

    public function store(Request $request)
    {
        Tahun::create([
            "tahun" => $request->tahun,
            "status" => "0"
        ]);

        return back();
    }

    public function edit($id)
    {
        $data = [
            "edit" => Tahun::where("id", $id)->first(),
            "data_tahun" => Tahun::where("id", "!=", $id)->orderBy("tahun", "DESC")->get()
        ];

        return view("/admin/page/tahun/edit", $data);
    }

    public function update(Request $request, $id)
    {
        Tahun::where("id", $id)->update([
            "tahun" => $request->tahun
        ]);

        return back();
    }

    public function destroy($id)
    {
        Tahun::where("id", $id)->delete();

        return back();
    }

    public function aktifkan(Request $request)
    {

        $data = Tahun::where("status", "1")->first();

        if ($data) {
            Tahun::where("status", "1")->update([
                "status" => "0"
            ]);
        }

        Tahun::where("id", $request->id)->update([
            "status" => "1"
        ]);

        return back();

    }

    public function non_aktifkan(Request $request)
    {
        Tahun::where("id", $request->id)->update([
            "status" => "0"
        ]);

        return back();
    }
}

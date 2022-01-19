<?php

namespace App\Http\Controllers;

use App\Models\Model\TerakhirLogin;
use Illuminate\Http\Request;

class TerakhirLoginController extends Controller
{
    public function index()
    {
        $data = [
            "data_terakhir_login" => TerakhirLogin::all()
        ];

        return view("admin.page.pengaturan.terakhir_login.index", $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(TerakhirLogin $terakhirLogin)
    {
        //
    }

    public function edit(TerakhirLogin $terakhirLogin)
    {
        //
    }

    public function update(Request $request, TerakhirLogin $terakhirLogin)
    {
        //
    }

    public function destroy(TerakhirLogin $terakhirLogin)
    {
        //
    }
}

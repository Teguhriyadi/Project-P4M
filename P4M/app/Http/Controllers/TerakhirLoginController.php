<?php

namespace App\Http\Controllers;

use App\Models\Model\TerakhirLogin;
use Illuminate\Http\Request;

class TerakhirLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "data_terakhir_login" => TerakhirLogin::all()
        ];

        return view("/admin/page/terakhir_login/index", $data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Model\TerakhirLogin  $terakhirLogin
     * @return \Illuminate\Http\Response
     */
    public function show(TerakhirLogin $terakhirLogin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Model\TerakhirLogin  $terakhirLogin
     * @return \Illuminate\Http\Response
     */
    public function edit(TerakhirLogin $terakhirLogin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model\TerakhirLogin  $terakhirLogin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TerakhirLogin $terakhirLogin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model\TerakhirLogin  $terakhirLogin
     * @return \Illuminate\Http\Response
     */
    public function destroy(TerakhirLogin $terakhirLogin)
    {
        //
    }
}

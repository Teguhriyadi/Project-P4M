<?php

namespace App\Http\Controllers;

use App\Models\Model\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "data_jabatan" => Jabatan::orderBy("nama_jabatan", "DESC")->get()
        ];

        return view("admin/page/jabatan/index", $data);
    }

    public function store(Request $request)
    {
        Jabatan::create($request->all());

        return back();
    }

    public function edit($id)
    {
        $data = [
            "edit" => Jabatan::where("id", $id)->first(),
            "data_jabatan" => Jabatan::where("id", "!=", $id)->orderBy("nama_jabatan", "DESC")->get()
        ];

        return view("admin/page/jabatan/edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Jabatan::where("id", $id)->update([
            "nama_jabatan" => $request->nama_jabatan
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jabatan::where("id", $id)->delete();

        return back();
    }
}

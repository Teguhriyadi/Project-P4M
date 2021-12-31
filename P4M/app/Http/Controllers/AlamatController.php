<?php

namespace App\Http\Controllers;

use App\Models\Model\Alamat;
use Illuminate\Http\Request;

class AlamatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "data_alamat" => Alamat::orderBy("created_at", "DESC")->paginate(1)
        ];

        return view("admin/page/alamat/index", $data);
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
        Alamat::create($request->all());

        return redirect()->back()->with('message', "<script>swal('Selamat!', 'Alamat anda berhasil ditambahkan', 'success')</script>");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Model\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function show(Alamat $alamat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Model\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function edit(Alamat $alamat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alamat $alamat)
    {
        Alamat::where("id", $alamat->id)->update([
            "website" => $request->website,
            "no_telepon" => $request->no_telepon,
            "alamat" => $request->alamat
        ]);

        return redirect()->back()->with('message', "<script>swal('Selamat!', 'Alamat anda berhasil diperbaharui', 'success')</script>");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alamat $alamat)
    {
        //
    }
}

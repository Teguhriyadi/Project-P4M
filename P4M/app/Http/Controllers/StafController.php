<?php

namespace App\Http\Controllers;

use App\Models\Model\Staf;
use Illuminate\Http\Request;

class StafController extends Controller
{
    public function index()
    {
        $data = [
            "data_staf" => Staf::orderBy("staf", "DESC")->get()
        ];

        return view("admin/page/staf/index", $data);
    }

    public function store(Request $request)
    {
        Staf::create($request->all());

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Model\Staf  $staf
     * @return \Illuminate\Http\Response
     */
    public function show(Staf $staf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Model\Staf  $staf
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            "edit" => Staf::where("id", $id)->first(),
            "data_staf" => Staf::where("id", "!=", $id)->orderBy("staf", "DESC")->get()
        ];

        return view("/admin/page/staf/edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model\Staf  $staf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Staf::where("id", $id)->update([
            "staf" => $request->staf
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model\Staf  $staf
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Staf::where("id", $id)->delete();

        return back();
    }
}

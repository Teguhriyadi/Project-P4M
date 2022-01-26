<?php

namespace App\Http\Controllers;

use App\Models\Model\SaranaPendidikan;
use Illuminate\Http\Request;

class SaranaPendidikanController extends Controller
{
    public function index()
    {
        $pendidikan = SaranaPendidikan::all();
        return view('admin.page.sarana.pendidikan.index', compact('pendidikan'));
    }

    public function store(Request $request)
    {
        $cek = SaranaPendidikan::where("jenis", $request->jenis)->count();

        if ($cek) {
            return redirect("/page/admin/sarana/pendidikan")->with('message', "<script>swal('Oops!', 'Tidak Boleh Duplikasi Data', 'error')</script>");
        } else {
            SaranaPendidikan::create($request->all());

            return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Tambahkan', 'success')</script>");
        }
    }

    public function edit(Request $request)
    {
        $edit = SaranaPendidikan::where('id', $request->id)->first();

        return view('admin.page.sarana.pendidikan.edit', compact('edit'));
    }

    public function update(Request $request)
    {
        SaranaPendidikan::where('id', $request->id)->update([
            'jenis' => $request->jenis,
            'jumlah' => $request->jumlah,
            'lokasi' => $request->lokasi,
        ]);

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Ubah', 'success')</script>");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SaranaPendidikan::where('id', $id)->delete();
        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Hapus', 'success')</script>");
    }
}

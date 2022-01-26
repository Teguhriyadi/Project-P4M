<?php

namespace App\Http\Controllers;

use App\Models\Model\SaranaAgama;
use Illuminate\Http\Request;

class SaranaAgamaController extends Controller
{
    public function index()
    {
        $agama = SaranaAgama::all();
        return view('admin.page.sarana.agama.index', compact('agama'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $cek = SaranaAgama::where("jenis", $request->jenis)->count();

        if ($cek) {
            return redirect("/page/admin/sarana/keagamaan")->with('message', "<script>swal('Oops', 'Tidak Boleh Duplikasi Data', 'error');</script>");
        } else {
            SaranaAgama::create($request->all());

            return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Tambahkan', 'success')</script>");
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Request $request)
    {
        $edit = SaranaAgama::where('id', $request->id)->first();

        return view('admin.page.sarana.agama.edit', compact('edit'));
    }

    public function update(Request $request)
    {
        SaranaAgama::where('id', $request->id)->update([
            'jenis' => $request->jenis,
            'jumlah' => $request->jumlah,
            'lokasi' => $request->lokasi,
        ]);

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Ubah', 'success')</script>");
    }

    public function destroy($id)
    {
        SaranaAgama::where('id', $id)->delete();
        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Hapus', 'success')</script>");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Model\SaranaOlahraga;
use Illuminate\Http\Request;

class SaranaOlahragaController extends Controller
{
    public function index()
    {
        $olahraga = SaranaOlahraga::all();
        return view('admin.page.sarana.olahraga.index', compact('olahraga'));
    }
    public function store(Request $request)
    {
        $cek = SaranaOlahraga::where("jenis", $request->jenis)->count();

        if ($cek) {
            return redirect("/page/admin/sarana/olahraga")->with('message', "<script>swal('Oops!', 'Tidak Boleh Duplikasi Data', 'error')</script>");
        } else {
            SaranaOlahraga::create($request->all());

            return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Tambahkan', 'success')</script>");
        }
    }

    public function edit(Request $request)
    {
        $edit = SaranaOlahraga::where('id', $request->id)->first();

        return view('admin.page.sarana.olahraga.edit', compact('edit'));
    }

    public function update(Request $request)
    {
        SaranaOlahraga::where('id', $request->id)->update([
            'jenis' => $request->jenis,
            'jumlah' => $request->jumlah,
            'lokasi' => $request->lokasi,
        ]);

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Ubah', 'success')</script>");
    }

    public function destroy($id)
    {
        SaranaOlahraga::where('id', $id)->delete();
        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Hapus', 'success')</script>");
    }
}

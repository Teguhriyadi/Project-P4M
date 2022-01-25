<?php

namespace App\Http\Controllers;

use App\Models\Model\SaranaTempatUsaha;
use Illuminate\Http\Request;

class SaranaTUController extends Controller
{
    public function index()
    {
        $tempat_usaha = SaranaTempatUsaha::all();
        return view('admin.page.sarana.tu.index', compact('tempat_usaha'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $cek = SaranaTempatUsaha::where("nama", $request->nama)->count();

        if ($cek) {
            return redirect("/page/admin/sarana/tempat-usaha")->with('message', "<script>swal('Oops', 'Tidak Boleh Duplikasi Data', 'error');</script>");
        } else {
            SaranaTempatUsaha::create($request->all());

            return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Tambahkan', 'success')</script>");
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Request $request)
    {
        $edit = SaranaTempatUsaha::where('id', $request->id)->first();

        return view('admin.page.sarana.tu.edit', compact('edit'));
    }

    public function update(Request $request)
    {
        SaranaTempatUsaha::where('id', $request->id)->update([
            'jenis' => $request->jenis,
            'jumlah' => $request->jumlah,
            'lokasi' => $request->lokasi,
        ]);

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Ubah', 'success')</script>");
    }

    public function destroy($id)
    {
        SaranaTempatUsaha::where('id', $id)->delete();
        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Hapus', 'success')</script>");
    }
}

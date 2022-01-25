<?php

namespace App\Http\Controllers;

use App\Models\Model\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $data = [
            "data_jabatan" => Jabatan::orderBy("nama_jabatan", "DESC")->get()
        ];

        return view("admin/page/pemerintahan/jabatan/index", $data);
    }

    public function store(Request $request)
    {
        $nama_jabatan = $request->nama_jabatan;
        $data = Jabatan::where("nama_jabatan", $nama_jabatan)->count();

        if ($data) {
            return back()->with('message', "<script>swal('Maaf!', 'Tidak Boleh Duplikasi Data', 'error')</script>");
        } else {
            Jabatan::create($request->all());
        }

        return redirect("/page/admin/pemerintahan/jabatan")->with('message', "<script>swal('Selamat!', 'Data anda berhasil ditambahkan', 'success')</script>");

    }

    public function edit($id)
    {
        $data = [
            "edit" => Jabatan::where("id", $id)->first(),
            "data_jabatan" => Jabatan::where("id", "!=", $id)->orderBy("nama_jabatan", "DESC")->get()
        ];

        return view("admin/page/pemerintahan/jabatan/edit", $data);
    }

    public function update(Request $request, $id)
    {
        $nama_jabatan = $request->nama_jabatan;

        $data = Jabatan::where("nama_jabatan", $nama_jabatan)->count();

        if ($data) {
            return back()->with('message', "<script>swal('Maaf!', 'Tidak Boleh Duplikasi Data', 'error')</script>");
        } else {
            Jabatan::where("id", $id)->update([
                "nama_jabatan" => $request->nama_jabatan
            ]);
        }

        return redirect('page/admin/pemerintahan/jabatan')->with('message', "<script>swal('Selamat!', 'Data anda berhasil diubah', 'success')</script>");
    }

    public function destroy($id)
    {
        Jabatan::where("id", $id)->delete();

        return back()->with('message', "<script>swal('Selamat!', 'Data anda berhasil dihapus', 'success')</script>");
    }
}

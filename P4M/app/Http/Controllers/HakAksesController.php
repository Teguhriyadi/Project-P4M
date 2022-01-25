<?php

namespace App\Http\Controllers;

use App\Models\Model\HakAkses;
use Illuminate\Http\Request;

class HakAksesController extends Controller
{
    public function index()
    {
        $data = [
            "data_hak_akses" => HakAkses::all()
        ];

        return view("admin/page/pengaturan/hak_akses/index", $data);
    }

    public function store(Request $request)
    {
        $cek = HakAkses::where("nama_hak_akses", $request->nama_hak_akses)->count();

        if ($cek) {
            return redirect("/page/admin/pengaturan/hak_akses")->with('message', "<script>swal('Oops!', 'Maaf, Tidak Boleh Duplikasi Data', 'error')</script>");
        } else {
            HakAkses::create($request->all());

            return redirect("/page/admin/pengaturan/hak_akses")->with('message', "<script>swal('Selamat!', 'Data Berhasil di Tambahkan', 'success')</script>");
        }

    }

    public function show()
    {
        $hakAkses = HakAkses::orderBy("nama_hak_akses", "DESC")->get();

        $data = array();

        foreach ($hakAkses as $ha) {
            $data[] = array(
                'nama' => $ha->nama_hak_akses,
                'edit' =>'<a href="/page/admin/pengaturan/hak_akses/'.$ha->id.'/edit" class="btn btn-warning" style="margin-right: 10px"><i class="fa fa-edit"></a>',
                'hapus' => '<form style="display: inline;" action="/page/admin/pengaturan/hak_akses/'.$ha->id.'" method="POST"><input type="hidden" name="_method" value="delete" /><input type="hidden" name="_token" value="'.csrf_token().'" /><button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></form>'
            );
        }

        return response()->json($data);
    }

    public function edit($id)
    {
        $data = [
            "edit" => HakAkses::where("id", $id)->first(),
            "data_hak_akses" => HakAkses::where("id", "!=", $id)->orderBy("nama_hak_akses", "DESC")->get()
        ];

        return view("/admin/page/pengaturan/hak_akses/edit", $data);
    }

    public function update(Request $request, $id)
    {
        $cek = HakAkses::where("nama_hak_akses", $request->nama_hak_akses)->count();

        if ($cek) {
            return redirect("/page/admin/pengaturan/hak_akses/")->with('message', "<script>swal('Oops', 'Maaf, Tidak Boleh Duplikasi Data', 'error')</script>");
        } else {
            HakAkses::where("id", $id)->update([
                "nama_hak_akses" => $request->nama_hak_akses
            ]);

            return redirect("/page/admin/pengaturan/hak_akses/")->with('message', "<script>swal('Selamat!', 'Data berhasil diubah', 'success')</script>");
        }
    }

    public function destroy($id)
    {
        HakAkses::where("id", $id)->delete();

        return redirect("/page/admin/pengaturan/hak_akses")->with('message', "<script>swal('Selamat!', 'Data berhasil dihapus', 'success')</script>");
    }
}

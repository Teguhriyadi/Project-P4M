<?php

namespace App\Http\Controllers;

use App\Models\Model\Coba;
use App\Models\Model\Jabatan;
use App\Models\Model\Pegawai;
use App\Models\Model\Penduduk;
use App\Models\Model\StrukturPemerintahan;
use Dotenv\Util\Str;
use Illuminate\Http\Request;

class StrukturPemerintahanController extends Controller
{
    public function index()
    {
        $data = [
            "data_struktur" => StrukturPemerintahan::orderBy("id", "DESC")->get(),
            "data_jabatan" => Jabatan::orderBy("nama_jabatan", "DESC")->get(),
            "data_pegawai" => Pegawai::orderBy("nama", "DESC")->get()
        ];

        foreach ($data['data_pegawai'] as $pegawai) {
            if (!empty($pegawai->id_penduduk)) {
                $data['penduduk'] = Penduduk::where('id', $pegawai->id_penduduk)->first();
            }
        }

        return view("admin.page.pemerintahan.struktur_pemerintahan.index", $data);
    }

    public function store(Request $request)
    {
        $get = $request->staf_id;

        $ambil = StrukturPemerintahan::where("jabatan_id", $get)->first();
        $j_data = new StrukturPemerintahan;

        if ($j_data->count()) {
            if ($ambil == NULL) {
                $id_staf = $get;
            } else {
                $id_staf = $ambil->id;
            }
        } else {
            $id_staf = 0;
        }

        StrukturPemerintahan::create([
            "jabatan_id" => $request->jabatan_id,
            "pegawai_id" => $request->pegawai_id,
            "staf_id" => $id_staf
        ]);

        return back()->with('message', "<script>swal('Selamat!', 'Data anda berhasil ditambahkan', 'success')</script>");

    }

    public function edit($id)
    {
        $data = [
            "edit" => StrukturPemerintahan::where("id", $id)->first(),
            "data_struktur" => StrukturPemerintahan::where("id", "!=", $id)->orderBy("id", "DESC")->get(),
            "data_jabatan" => Jabatan::orderBy("nama_jabatan", "DESC")->get(),
            "data_pegawai" => Pegawai::orderBy("nama", "DESC")->get()
        ];

        return view("admin/page/pemerintahan/struktur_pemerintahan/edit", $data);
    }

    public function update(Request $request, $id)
    {
        StrukturPemerintahan::where("id", $id)->update([
            "jabatan_id" => $request->jabatan_id,
            "pegawai_id" => $request->pegawai_id
        ]);

        return back()->with('message', "<script>swal('Selamat!', 'Data anda berhasil diubah', 'success')</script>");
    }

    public function destroy($id)
    {
        StrukturPemerintahan::where("id", $id)->delete();

        return back()->with('message', "<script>swal('Selamat!', 'Data anda berhasil dihapus', 'success')</script>");
    }

    public function show()
    {
        $data = [
            "data_struktur" => StrukturPemerintahan::orderBy("id", "asc")->get()
        ];

        return view("admin/page/pemerintahan/struktur_pemerintahan/show", $data);
    }

    public function showChart()
    {
        $struktur = StrukturPemerintahan::get();

        $data = array();

        foreach ($struktur as $s) {
            $data['nodes'][] = array(
                'id' => $s->id,
                'pid' => $s->staf_id,
                'name' => $s->getPegawai->nama,
                'title' => $s->getJabatan->nama_jabatan,
            );
        }

        return response()->json($data);
    }

    public function addChart(Request $request)
    {
        $cek = Coba::create([
            'id_balkan' => $request->id_balkan,
            'pid' => $request->pid,
            'name' => $request->name,
            'title' => $request->title,
        ]);

        if ($cek) {
            echo 1;
        } else {
            echo 2;
        }
    }

    public function editChart(Request $request)
    {
        $cek = Coba::where('id_balkan', $request->id_balkan)->update([
            'pid' => $request->pid,
            'name' => $request->name,
            'title' => $request->title,
        ]);

        if ($cek) {
            echo 1;
        } else {
            echo 2;
        }
    }

    public function hapusChart($id)
    {
        $data = Coba::where('id_balkan', $id)->first();

        $cek = Coba::where('id', $data->id)->delete();

        if ($cek) {
            echo 1;
        } else {
            echo 2;
        }
    }

    public function dropChart(Request $request)
    {
        // echo $request->pid;
        $cek = StrukturPemerintahan::where("id", $request->id)->update([
            "staf_id" => $request->staf_id
        ]);

        if ($cek) {
            echo 1;
        } else {
            echo 2;
        }
    }
}

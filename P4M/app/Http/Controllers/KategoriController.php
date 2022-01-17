<?php

namespace App\Http\Controllers;

use App\Models\Model\Kategori;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class KategoriController extends Controller
{
    public function index()
    {
        return view("/admin/page/web/kategori/index");
    }

    public function store(Request $request)
    {
        $cek = Kategori::create($request->all());

        if ($cek) {
            echo 1;
        } else {
            echo 2;
        }
    }

    public function show(Request $request)
    {
        $columns = array(
            1 => 'nama'
        );

        $totalData = Kategori::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $kategori = Kategori::offset($start)
                                ->limit($limit)
                                ->orderBy($order, $dir)
                                ->get();
        } else {
            $search = $request->input('search.value');

            $kategori = Kategori::where('nama', 'like', "%{$search}%")
                                ->offset($start)
                                ->limit($limit)
                                ->orderBy($order, $dir)
                                ->get();

            $totalFiltered = Kategori::where('nama', 'like', "%{$search}%")->count();
        }

        $data = array();

        if (!empty($kategori)) {
            $no = 1;
            foreach ($kategori as $k) {
                $nestedData['no'] = $no++;
                $nestedData['slug'] = $k->slug;
                $nestedData['nama'] = $k->nama;
                $nestedData['aksi'] = '<a class="btn btn-warning btn-sm" href="/page/admin/web/kategori/'. $k->slug .'/edit" style="margin-right: 10px"><i class="fa fa-pencil"></i></a>';
                $nestedData['aksi'] .= '<button class="btn btn-danger btn-sm" id="hapusKategori" data-id="'.$k->id.'"><i class="fa fa-trash-o"></i></button>';

                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );

        return response()->json($json_data);
    }

    public function edit(Kategori $kategori)
    {
        $data = [
            "edit" => Kategori::where("id", $kategori->id)->first(),
            "data_kategori" => Kategori::where("id","!=" ,$kategori->id)->get()
        ];

        return view("/admin/page/web/kategori/edit", $data);
    }

    public function update(Request $request, Kategori $kategori)
    {
        Kategori::where("id", $kategori->id)->update([
            "nama" => $request->nama,
            "slug" => $request->slug
        ]);

        return redirect("/page/admin/web/kategori")->with('message', "<script>swal('Selamat!', 'Data anda berhasil diubah', 'success')</script>");
    }

    public function destroy(Request $request, $id)
    {
        $cek = Kategori::destroy($id);

        if ($cek) {
            echo 1;
        } else {
            echo 2;
        }
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Kategori::class, 'slug', $request->nama);

        return response()->json(['slug' => $slug]);
    }
}

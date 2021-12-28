<?php

namespace App\Http\Controllers;

use App\Models\Model\Kategori;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class KategoriController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view("/admin/page/kategori/index");
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
        $cek = Kategori::create($request->all());

        if ($cek) {
            echo 1;
        } else {
            echo 2;
        }
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Model\Kategori  $kategori
    * @return \Illuminate\Http\Response
    */
    public function show(Request $request)
    {
        $columns = array(
            0 => 'nama'
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
                $nestedData['aksi'] = $k->nama;

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

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Model\Kategori  $kategori
    * @return \Illuminate\Http\Response
    */
    public function edit(Kategori $kategori)
    {
        $data = [
            "edit" => Kategori::where("id", $kategori->id)->first(),
            "data_kategori" => Kategori::where("id","!=" ,$kategori->id)->get()
        ];

        return view("/admin/page/kategori/edit", $data);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Model\Kategori  $kategori
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Kategori $kategori)
    {
        Kategori::where("id", $kategori->id)->update([
            "nama" => $request->nama,
            "slug" => $request->slug
        ]);

        return redirect("/page/admin/kategori");
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Model\Kategori  $kategori
    * @return \Illuminate\Http\Response
    */
    public function destroy(Kategori $kategori)
    {
        Kategori::where('id', $kategori->id)->delete();

        return redirect()->back();
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Kategori::class, 'slug', $request->nama);

        return response()->json(['slug' => $slug]);
    }
}

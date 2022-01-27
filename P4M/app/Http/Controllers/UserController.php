<?php

namespace App\Http\Controllers;

use App\Models\Model\Rt;
use App\Models\Model\Rw;
use App\Models\Model\Dusun;
use App\Models\Model\Peta;
use App\Models\Model\Alamat;
use App\Models\Model\Artikel;
use App\Models\Model\Counter;
use App\Models\Model\Galeri;
use App\Models\Model\Kontak;
use App\Models\Model\Profil;
use App\Models\Model\VisiMisi;
use App\Models\Model\Geografis;
use App\Models\Model\Komentar;
use App\Models\Model\WilayahGeografis;
use App\Models\Model\StrukturPemerintahan;
use App\Models\Model\Penduduk;
use App\Models\Model\PendudukSex;
use App\Models\Model\PendudukAgama;
use App\Models\Model\PendudukPendidikan;
use App\Models\Model\PendudukPekerjaan;
use App\Models\Model\PendudukWargaNegara;
use App\Models\Model\SaranaAgama;
use App\Models\Model\SaranaOlahraga;
use App\Models\Model\SaranaPendidikan;
use App\Models\Model\SaranaTempatUsaha;
use App\Models\Model\Sejarah;
use Illuminate\Http\Request;
use DataTables;

class UserController extends Controller
{
    protected $penduduk;

    public function __construct() {
        $this->penduduk = Penduduk::count();
    }

    public function index()
    {
        $data = [
            "data_profil" => Profil::first(),
            "data_galeri" => Galeri::latest()->paginate(6),
        ];

        return view("pengunjung.page.home", $data);
    }

    public function artikel()
    {
        $data = [
            "data_artikel" => Artikel::latest()->paginate(6),
            "data_title" => 'Artikel',
        ];

        return view("/pengunjung/page/artikel/index", $data);
    }

    public function artikelCari(Request $request)
    {
        $data = [
            "data_artikel" => Artikel::where("judul", "like", "%".$request->cari."%")->latest()->paginate(6),
            "data_title" => $request->cari,
        ];

        return view("/pengunjung/page/artikel/index", $data);
    }

    public function artikelJson(Request $request)
    {
        $search = $request->search;

        if($search == ''){
            $artikel = Artikel::orderby('judul','asc')->select('judul')->limit(5)->get();
        }else{
            $artikel = Artikel::orderby('judul','asc')->select('judul')->where('judul', 'like', '%' .$search . '%')->limit(5)->get();
        }

        $response = array();
        foreach($artikel as $a){
            $response[] = array("judul"=>$a->judul);
        }

        return response()->json($response);
    }

    public function detailArtikel($slug)
    {
        $data = [
            "artikel" => Artikel::where("slug", $slug)->first(),
        ];

        if ($data['artikel']) {
            $data['komentar'] = Komentar::where('id_artikel', $data['artikel']->id)->latest()->paginate(6);
            $data['counter'] = Counter::where('id_artikel', $data['artikel']->id)->get();

            Counter::create(['id_artikel' => $data['artikel']->id, 'address' => $_SERVER['REMOTE_ADDR']]);

            return view("/pengunjung/page/artikel/detail", $data);
        } else {
            abort(404);
        }
    }

    public function galeri()
    {
        $data = [
            "data_galeri" => Galeri::latest()->paginate(6),
        ];

        return view("/pengunjung/page/galeri", $data);
    }

    public function sarprasPendidikan()
    {
        $pendidikan = SaranaPendidikan::all();
        return view('pengunjung.page.sarpras.pendidikan', compact('pendidikan'));
    }

    public function sarprasAgama()
    {
        $agama = SaranaAgama::all();
        return view('pengunjung.page.sarpras.agama', compact('agama'));
    }

    public function sarprasOlahraga()
    {
        $olahraga = SaranaOlahraga::all();
        return view('pengunjung.page.sarpras.olahraga', compact('olahraga'));
    }

    public function sarprasTempatUsaha()
    {
        $tempatUsaha = SaranaTempatUsaha::all();
        return view('pengunjung.page.sarpras.tempat-usaha', compact('tempatUsaha'));
    }

    public function profil()
    {
        return view("pengunjung/page/profil/index");
    }

    public function sejarah()
    {
        $sejarah = Sejarah::first();
        return view("pengunjung/page/profil/sejarah", compact('sejarah'));
    }

    public function wilayah()
    {
        $data = [
            "data_geografis" => Geografis::paginate(1),
            "data_wgeografis" => WilayahGeografis::all(),
            "peta" => Peta::first(),
        ];

        return view("pengunjung/page/profil/wilayah", $data);
    }

    public function visiMisi()
    {
        $data = [
            "data_visimisi" => VisiMisi::paginate(1)
        ];

        return view("pengunjung/page/pemerintahan_desa/visi_misi", $data);
    }

    public function pemerintahanDesa()
    {
        return view("pengunjung/page/pemerintahan_desa/index");
    }

    public function strukturOrganisasi()
    {
        $data = [
            "data_struktur" => StrukturPemerintahan::all()
        ];

        return view("pengunjung/page/pemerintahan_desa/struktur_organisasi", $data);
    }

    public function strukturOrganisasiShow()
    {
        $data = [
            "data_struktur" => StrukturPemerintahan::all()
        ];
        return view("pengunjung/page/pemerintahan_desa/struktur_organisasi_show", $data);
    }

    public function dataDesa()
    {
        return view("pengunjung/page/data_desa/index");
    }

    public function pendidikan()
    {
        $pendidikan = PendudukPendidikan::withCount('getCountPenduduk')->get();
        $penduduk = $this->penduduk;
        return view("pengunjung/page/data_desa/pendidikan", compact("pendidikan", "penduduk"));
    }

    public function pekerjaan()
    {
        $pekerjaan = PendudukPekerjaan::withCount('getCountPenduduk')->get();
        $penduduk = $this->penduduk;
        return view("pengunjung/page/data_desa/pekerjaan", compact("pekerjaan", "penduduk"));
    }

    public function agama()
    {
        $agama = PendudukAgama::withCount('getCountPenduduk')->get();
        $penduduk = $this->penduduk;
        return view("pengunjung/page/data_desa/agama", compact("agama", "penduduk"));
    }

    public function jenisKelamin()
    {
        $jk = PendudukSex::withCount('getCountPenduduk')->get();
        $penduduk = $this->penduduk;
        return view("pengunjung/page/data_desa/jk", compact("jk", "penduduk"));
    }

    public function wargaNegara()
    {
        $wargaNegara = PendudukWargaNegara::withCount('getCountPenduduk')->get();
        $penduduk = $this->penduduk;
        return view("pengunjung/page/data_desa/warga-negara", compact("wargaNegara", "penduduk"));
    }

    public function wilayahAdministratif()
    {
        $dataDusun = Dusun::all();

        return view("pengunjung/page/data_desa/wilayah-administratif", compact('dataDusun'));
    }

    public function kependudukan()
    {
        return view("pengunjung.page.kependudukan.index");
    }

    public function penduduk()
    {
        $data = Penduduk::select('nama','id_sex','id_rt')->where('id_status_dasar', 1)->orderBy('nama', 'asc')->get();
        return DataTables::of($data)
                        ->addIndexColumn()
                        ->toJson();
    }
}

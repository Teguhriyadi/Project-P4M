<?php

namespace App\Http\Controllers;

use App\Models\Model\RtRw;
use App\Models\Model\Peta;
use App\Models\Model\Alamat;
use App\Models\Model\Berita;
use App\Models\Model\Galeri;
use App\Models\Model\Kontak;
use App\Models\Model\Profil;
use App\Models\Model\VisiMisi;
use App\Models\Model\Geografis;
use App\Models\Model\WilayahGeografis;
use App\Models\Model\StrukturPemerintahan;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            "data_profil" => Profil::latest()->paginate(1),
            "data_berita" => Berita::latest()->paginate(6),
            "data_galeri" => Galeri::latest()->paginate(6),
        ];
        
        return view("/pengunjung/page/home", $data);
    }
    
    public function berita()
    {
        $data = [
            "data_berita" => Berita::latest()->paginate(6)
        ];
        
        return view("/pengunjung/page/berita/index", $data);
    }
    
    public function detailBerita($slug)
    {
        $data = [
            "detail" => Berita::where("slug", $slug)->first(),
            "berita" => Berita::where("slug", $slug)->first()
        ];
        
        return view("/pengunjung/page/berita/detail", $data);
    }
    
    public function galeri()
    {
        $data = [
            "data_galeri" => Galeri::orderBy("created_at", "DESC")->paginate(6),
        ];
        
        return view("/pengunjung/page/galeri", $data);
    }
    
    public function kontak()
    {
        $data = [
            'data_alamat' => Alamat::paginate(1)
        ];
        
        return view("/pengunjung/page/kontak", $data);
    }
    
    public function kirim_pesan(Request $request)
    {
        Kontak::create($request->all());
        
        return redirect()->back()->with('message', "<script>swal('Selamat!', 'Pesan anda berhasil dikirim', 'success')</script>");
    }
    
    public function profil()
    {
        return view("pengunjung/page/profil/index");
    }
    
    public function sejarah()
    {
        return view("pengunjung/page/profil/sejarah");
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
    
    public function wilayahAdministratif()
    {
        $dataDusun = RtRw::all();
        
        return view("pengunjung/page/data_desa/wilayah-administratif", compact('dataDusun'));
    }

    public function peta()
    {
        $peta = Peta::first();

        return view("pengunjung/page/peta/index", compact('peta'));
    }
}

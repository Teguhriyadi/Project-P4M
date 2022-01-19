<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ArsipSuratController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DusunController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GeografisController;
use App\Http\Controllers\GolonganDarahController;
use App\Http\Controllers\HakAksesController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JenisSDAController;
use App\Http\Controllers\JenisSDKController;
use App\Http\Controllers\JenisSDMController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KlasifikasiSuratController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PendudukAgamaController;
use App\Http\Controllers\PendudukPekerjaanController;
use App\Http\Controllers\PendudukPendidikanController;
use App\Http\Controllers\PendudukSexController;
use App\Http\Controllers\PendudukWargaNegaraController;
use App\Http\Controllers\PotensiController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\StrukturPemerintahanController;
use App\Http\Controllers\TahunController;
use App\Http\Controllers\TerakhirLoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\WilayahGeografisController;
use App\Http\Controllers\PetaController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\PermohonanSuratController;
use App\Http\Controllers\RefSyaratSuratController;
use App\Http\Controllers\RtController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\SaranaAgamaController;
use App\Http\Controllers\SaranaOlahragaController;
use App\Http\Controllers\SaranaPendidikanController;
use App\Http\Controllers\SaranaTUController;
use App\Http\Controllers\SyaratSuratController;
use App\Http\Controllers\SuratFormatController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratOnlineController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\SejarahController;
use App\Models\Model\Pegawai;
use App\Models\Model\StrukturPemerintahan;
use App\Models\Model\WilayahGeografis;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [UserController::class, "index"]);

// Galeri
Route::get("/galeri", [UserController::class, "galeri"]);

// Artikel
Route::prefix("artikel")->group(function() {
    // Semua Artikel
    Route::get("/", [UserController::class, "artikel"]);

    // Pencarian Artikel
    Route::post("/cari", [UserController::class, "artikelCari"]);

    // Artikel JSON
    Route::post("/", [UserController::class, "artikelJson"]);

    // Artikel Selengkapnya
    Route::get('/{slug}',[UserController::class, "detailArtikel"]);
});

// Sarana Prasarana
Route::prefix('sarpras')->group(function () {
    Route::get("/pendidikan", [UserController::class, "sarprasPendidikan"]);

    Route::get("/agama", [UserController::class, "sarprasAgama"]);

    Route::get("/olahraga", [UserController::class, "sarprasOlahraga"]);

    Route::get("/tempat-usaha", [UserController::class, "sarprasTempatUsaha"]);
});

// Profil
Route::prefix('profil')->group(function () {
    Route::get("/", [UserController::class, "profil"]);

    // Sejarah Desa
    Route::get("/sejarah-desa", [UserController::class, "sejarah"]);

    // Wilayah Desa
    Route::get("/wilayah-desa", [UserController::class, "wilayah"]);
});

// Pemerintahan Desa
Route::prefix('pemerintahan')->group(function () {
    Route::get('/', [UserController::class, 'pemerintahanDesa']);

    // Visi Misi
    Route::get('/visi-misi', [UserController::class, 'visiMisi']);

    // Struktur Organisasi
    Route::get('/struktur-organisasi', [UserController::class, 'strukturOrganisasi']);
    Route::get('/struktur-organisasi/show', [UserController::class, 'strukturOrganisasiShow']);
});

// Data Desa
Route::prefix('/data')->group(function () {
    Route::get('/', [UserController::class, 'dataDesa']);

    // Data Wilayah Administratif
    Route::get('/wilayah-administratif', [UserController::class, 'wilayahAdministratif']);

    // Pendidikan
    Route::get('/pendidikan', [UserController::class, 'pendidikan']);

    // Pekerjaan
    Route::get('/pekerjaan', [UserController::class, 'pekerjaan']);

    // Agama
    Route::get('/agama', [UserController::class, 'agama']);

    // Jenis Kelamin
    Route::get('/jenis-kelamin', [UserController::class, 'jenisKelamin']);

    // Warga Negara
    Route::get('/warga-negara', [UserController::class, 'wargaNegara']);

});

Route::get('/peta', [UserController::class, 'peta']);
Route::resource('/surat', SuratOnlineController::class);

// Admin
Route::prefix("page")->group(function() {

    Route::group(["middleware" => ["guest"]], function() {
        Route::get("/login", [LoginController::class, "login"])->name("login");
        Route::post("/post_login", [LoginController::class, "post_login"]);
    });

    Route::group(["middleware" => ["auth"]], function() {
        Route::prefix("admin")->group(function() {
            Route::get("/", [AppController::class, "dashboard"]);
            // Dashboard
            Route::get("/dashboard", [AppController::class, "dashboard"]);

            // Kategori
            Route::get("/kategori/checkSlug", [KategoriController::class, "checkSlug"]);
            Route::resource("/kategori", KategoriController::class);

            // Tahun
            Route::post("/tahun/aktifkan", [TahunController::class, "aktifkan"]);
            Route::post("/tahun/non-aktifkan", [TahunController::class, "non_aktifkan"]);
            Route::resource("/tahun", TahunController::class);

            // Potensi
            Route::get("/potensi", [PotensiController::class, "index"]);

            // Sumber Daya Kelembagaan
            Route::get("/jenis_sdk/edit", [JenisSDKController::class, "edit"]);
            Route::put("/jenis_sdk/simpan", [JenisSDKController::class, "update"]);
            Route::resource("/jenis_sdk", JenisSDKController::class);

            Route::prefix("info")->group(function() {
                Route::resource("/profil", ProfilController::class);
                Route::resource("/sejarah-desa", SejarahController::class);
                Route::resource("/visi-misi", VisiMisiController::class);

                Route::resource("/geografis", GeografisController::class);

                Route::get("/wilayah_geografis/edit", [WilayahGeografisController::class, "edit"]);
                Route::put("/wilayah_geografis/simpan", [WilayahGeografisController::class, "update"]);
                Route::resource("/wilayah_geografis", WilayahGeografisController::class);
            });

            Route::prefix("data")->group(function() {

                // Dusun
                Route::get("/dusun/edit", [DusunController::class, "edit"]);
                Route::put("/dusun/simpan", [DusunController::class, "update"]);
                Route::resource("/dusun", DusunController::class);

                // RT
                Route::get("/rt/edit", [RtController::class, "edit"]);
                Route::put("/rt/simpan", [RtController::class, "update"]);
                Route::resource("/rt", RtController::class);

                // RW
                Route::get("/rw/edit", [RwController::class, "edit"]);
                Route::put("/rw/simpan", [RwController::class, "update"]);
                Route::resource("/rw", RwController::class);

                // Pendidikan
                Route::get("/pendidikan/edit", [PendudukPendidikanController::class, "edit"]);
                Route::put("/pendidikan/simpan", [PendudukPendidikanController::class, "update"]);
                Route::resource("/pendidikan", PendudukPendidikanController::class);

                // Pekerjaan
                Route::get("/pekerjaan/edit", [PendudukPekerjaanController::class, "edit"]);
                Route::put("/pekerjaan/simpan", [PendudukPekerjaanController::class, "update"]);
                Route::resource("/pekerjaan", PendudukPekerjaanController::class);

                // Agama
                Route::get("/agama/edit", [PendudukAgamaController::class, "edit"]);
                Route::put("/agama/simpan", [PendudukAgamaController::class, "update"]);
                Route::resource("/agama", PendudukAgamaController::class);

                // Jenis Kelamin
                Route::get("/jenis-kelamin/edit", [PendudukSexController::class, "edit"]);
                Route::put("/jenis-kelamin/simpan", [PendudukSexController::class, "update"]);
                Route::resource("/jenis-kelamin", PendudukSexController::class);

                // Warga Negara
                Route::get("/warga-negara/edit", [PendudukWargaNegaraController::class, "edit"]);
                Route::put("/warga-negara/simpan", [PendudukWargaNegaraController::class, "update"]);
                Route::resource("/warga-negara", PendudukWargaNegaraController::class);

                // Golongan Darah
                Route::get("/golongan-darah/edit", [GolonganDarahController::class, "edit"]);
                Route::put("/golongan-darah/simpan", [GolonganDarahController::class, "update"]);
                Route::resource("/golongan-darah", GolonganDarahController::class);
            });

            Route::prefix("/pemerintahan")->group(function() {
                // Jabatan
                Route::resource("/jabatan", JabatanController::class);

                // Pegawai
                Route::get("/pegawai/edit", [PegawaiController::class, "edit"]);
                Route::put("/pegawai/simpan", [PegawaiController::class, "update"]);
                Route::resource("/pegawai", PegawaiController::class);

                // Struktur Pemerintahan
                Route::get("/struktur_pemerintahan/show", [StrukturPemerintahanController::class, "show"]);
                Route::post("/struktur_pemerintahan/dropChart", [StrukturPemerintahanController::class, "dropChart"]);
                Route::get("/struktur_pemerintahan/showChart", [StrukturPemerintahanController::class, "showChart"]);
                Route::post("/struktur_pemerintahan/addChart", [StrukturPemerintahanController::class, "addChart"]);
                Route::patch("/struktur_pemerintahan/editChart", [StrukturPemerintahanController::class, "editChart"]);
                Route::delete("/struktur_pemerintahan/hapusChart/{id}", [StrukturPemerintahanController::class, "hapusChart"]);
                Route::resource("/struktur_pemerintahan", StrukturPemerintahanController::class);
            });

            // Kependudukan
            Route::prefix('/kependudukan')->group(function () {
                // Penduduk
                Route::get('/penduduk/{id}/cetak', [PendudukController::class, "cetak"]);
                Route::get('/penduduk/edit_status_dasar', [PendudukController::class, "edit_status_dasar"]);
                Route::put('/penduduk/simpan_status_dasar', [PendudukController::class, "simpan_status_dasar"]);
                Route::resource('/penduduk', PendudukController::class);

                // Keluarga
                Route::get('/keluarga/form_tambah_penduduk_masuk', [KeluargaController::class, "form_tambah_penduduk_masuk"]);
                Route::post('/keluarga/tambah_data_penduduk_masuk', [KeluargaController::class, "tambah_data_penduduk_masuk"]);
                Route::get('/keluarga/{id}/rincian_keluarga', [KeluargaController::class, "rincian_keluarga"]);
                Route::get('/keluarga/{id}/rincian_keluarga/anggota_keluarga_lahir', [KeluargaController::class, "anggota_keluarga_lahir"]);
                Route::get('/keluarga/{id}/rincian_keluarga/anggota_keluarga_masuk', [KeluargaController::class, "anggota_keluarga_masuk"]);
                Route::get('/keluarga/form_edit_data_penduduk_masuk', [KeluargaController::class, "form_edit_data_penduduk_masuk"]);
                Route::resource('/keluarga', KeluargaController::class);
            });

            Route::prefix("surat")->group(function() {

                // Klasifikasi Surat
                Route::get("/klasifikasi/edit", [KlasifikasiSuratController::class, "edit"]);
                Route::put("/klasifikasi/simpan", [KlasifikasiSuratController::class, "update"]);
                Route::resource("/klasifikasi", KlasifikasiSuratController::class);

                // Referensi Syarat Surat
                Route::get("/ref_syarat/edit", [RefSyaratSuratController::class, "edit"]);
                Route::put("/ref_syarat/simpan", [RefSyaratSuratController::class, "update"]);
                Route::resource("/ref_syarat", RefSyaratSuratController::class);

                // Surat Format
                Route::get("/format/edit", [SuratFormatController::class, "edit"]);
                Route::put("/format/simpan", [SuratFormatController::class, "update"]);
                Route::resource("/format", SuratFormatController::class);

                // Permohonan Surat
                Route::resource("/permohonan", PermohonanSuratController::class);

                // Surat Masuk
                Route::resource("/masuk", SuratMasukController::class);

                // Surat Keluar
                Route::resource("/keluar", SuratKeluarController::class);

                // Arsip Surat
                Route::resource("/arsip", ArsipSuratController::class);
            });

            Route::get("/kotak-pesan", [KontakController::class, "index"]);

            Route::prefix('/pengaturan')->group(function () {
                // Akun
                Route::get("/akun/edit", [AkunController::class, "edit"]);
                Route::patch("/akun", [AkunController::class, "update"]);
                Route::resource("/akun", AkunController::class)->middleware("can:admin");

                // Hak Akses
                Route::resource("/hak_akses", HakAksesController::class);

                // TerakhirLogin
                Route::resource("/terakhir_login", TerakhirLoginController::class);
            });

            Route::prefix('/sumber')->group(function () {
                // Sumber Daya Alam
                Route::get('/alam/edit', [JenisSDAController::class, 'edit']);
                Route::patch('/alam', [JenisSDAController::class, 'update']);
                Route::resource("/alam", JenisSDAController::class);

                // Sumber Daya Manusia
                Route::resource("/manusia", JenisSDMController::class);

                // Sumber Daya Kelembagaan
                Route::get('/kelembagaan/edit', [JenisSDKController::class, 'edit']);
                Route::patch('/kelembagaan', [JenisSDKController::class, 'update']);
                Route::resource("/kelembagaan", JenisSDKController::class);
            });

            Route::prefix('/sarana')->group(function () {
                // Sarana Pendidikan
                Route::get('/pendidikan/edit', [SaranaPendidikanController::class, 'edit']);
                Route::patch('/pendidikan', [SaranaPendidikanController::class, 'update']);
                Route::resource("/pendidikan", SaranaPendidikanController::class);

                // Sarana Keagamaan
                Route::get('/keagamaan/edit', [SaranaAgamaController::class, 'edit']);
                Route::patch('/keagamaan', [SaranaAgamaController::class, 'update']);
                Route::resource("/keagamaan", SaranaAgamaController::class);

                // Sarana Olahraga
                Route::get('/olahraga/edit', [SaranaOlahragaController::class, 'edit']);
                Route::patch('/olahraga', [SaranaOlahragaController::class, 'update']);
                Route::resource("/olahraga", SaranaOlahragaController::class);

                // Sarana Tempat Usaha
                Route::get('/tempat-usaha/edit', [SaranaTUController::class, 'edit']);
                Route::patch('/tempat-usaha', [SaranaTUController::class, 'update']);
                Route::resource("/tempat-usaha", SaranaTUController::class);
            });

            // Logout
            Route::get("/logout", [LoginController::class, "logout"]);

            Route::prefix("/peta")->group(function() {
                // CRUD Peta Desa
                Route::get("/desa", [PetaController::class, "desa"]);
                Route::post("/desa", [PetaController::class, "desaStore"]);
                Route::put("/desa", [PetaController::class, "desaUpdate"]);

                // CRUD Peta Kantor
                Route::get("/kantor", [PetaController::class, "kantor"]);
                Route::post("/kantor", [PetaController::class, "kantorStore"]);
                Route::put("/kantor", [PetaController::class, "kantorUpdate"]);
            });

            Route::prefix("/web")->group(function() {

                // Galeri
                Route::get("/galeri/edit", [GaleriController::class, "edit"]);
                Route::put("/galeri/simpan", [GaleriController::class, "update"]);
                Route::resource("/galeri", GaleriController::class);

                // Kategori
                Route::get("/kategori/checkSlug", [KategoriController::class, "checkSlug"]);
                Route::resource("/kategori", KategoriController::class);

                // Artikel
                Route::get("/artikel/checkSlug", [ArtikelController::class, "checkSlug"]);
                Route::resource("/artikel", ArtikelController::class);
                // Komentar
                // Galeri
                // Slider
                // Teks Berjalan
                // Pengunjung
            });

        });
    });
});

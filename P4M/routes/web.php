<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GeografisController;
use App\Http\Controllers\HakAksesController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RtRwController;
use App\Http\Controllers\TerakhirLoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\WilayahGeografisController;
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

// Berita
Route::prefix("berita")->group(function() {
    // Semua Berita
    Route::get("/", [UserController::class, "berita"]);

    // Berita Selengkapnya
    Route::get('/{slug}',[UserController::class, "detailBerita"]);
});

// Kontak
Route::get("/kontak", [UserController::class, "kontak"]);
Route::post("/kirim_pesan", [UserController::class, "kirim_pesan"]);

// Profil
Route::prefix('profil')->group(function () {
    Route::get("/", [UserController::class, "profil"]);

    // Wilayah Desa
    Route::get("/wilayah-desa", [UserController::class, "wilayah"]);
});

// Pemerintahan Desa
Route::prefix('pemerintahan-desa')->group(function () {
    Route::get('/', [UserController::class, 'pemerintahanDesa']);

    // Visi Misi
    Route::get('/visi-misi', [UserController::class, 'visiMisi']);

    // Struktur Organisasi
    Route::get('/struktur-organisasi', [UserController::class, 'strukturOrganisasi']);
});

// Data Desa
Route::prefix('/data-desa')->group(function () {
    Route::get('/', [UserController::class, 'dataDesa']);

    // Data RT / RW
    Route::post('/rt-rw', [UserController::class, 'dataRtRw']);
});

// Admin
Route::prefix("page")->group(function() {

    Route::group(["middleware" => ["guest"]], function() {
        Route::get("/login", [LoginController::class, "login"])->name("login");
        Route::post("/post_login", [LoginController::class, "post_login"]);
    });

    Route::group(["middleware" => ["auth"]], function() {
        Route::prefix("admin")->group(function() {
            // Dashboard
            Route::get("/dashboard", [AppController::class, "dashboard"]);

            // Kategori
            Route::get("/kategori/checkSlug", [KategoriController::class, "checkSlug"]);
            Route::resource("/kategori", KategoriController::class);

            // Berita
            Route::get("/berita/checkSlug", [BeritaController::class, "checkSlug"]);
            Route::resource("/berita", BeritaController::class);

            // Galeri
            Route::get("/galeri/edit", [GaleriController::class, "edit"]);
            Route::put("/galeri/simpan", [GaleriController::class, "update"]);
            Route::resource("/galeri", GaleriController::class);

            // Jabatan
            Route::resource("/jabatan", JabatanController::class);

            // Akun
            Route::get("/akun/edit", [AkunController::class, "edit"]);
            Route::resource("/akun", AkunController::class);

            // Kontak
            Route::get("/kontak/", [KontakController::class, "index"]);

            // Profil Desa
            Route::resource("/profil", ProfilController::class);
            Route::resource("geografis", GeografisController::class);
            Route::get("/wilayah_geografis/edit", [WilayahGeografisController::class, "edit"]);
            Route::put("/wlayah_geografis/simpan", [WilayahGeografisController::class, "update"]);
            Route::resource("wilayah_geografis", WilayahGeografisController::class);
            // Alamat
            Route::resource("/alamat", AlamatController::class);

            // Visi & Misi
            Route::resource("/visi_misi", VisiMisiController::class);

            // RT dan RW
            Route::put("rt_rw/simpan", [RtRwController::class, "update"]);
            Route::get("/rt_rw/edit", [RtRwController::class, "edit"]);
            Route::resource("/rt_rw", RtRwController::class);

            // Hak Akses
            Route::resource("/hak_akses", HakAksesController::class);

            // TerakhirLogin
            Route::resource("/terakhir_login", TerakhirLoginController::class);

            Route::get("/logout", [LoginController::class, "logout"]);

        });
    });
});

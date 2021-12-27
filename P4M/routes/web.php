<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PostController;
use App\Models\Model\Kategori;
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

Route::get('/', function () {
    return view('pengunjung/page/home');
});

Route::prefix("page")->group(function() {
    Route::prefix("admin")->group(function() {

        // Dashboard
        Route::get("/dashboard", [AppController::class, "dashboard"]);

        // Kategori
        Route::get("/kategori/checkSlug", [KategoriController::class, "checkSlug"]);
        Route::resource("/kategori", KategoriController::class);

        // Post
        Route::resource("/blog", PostController::class);

    });
});

Route::get('/galeri', function () {
    return view('pengunjung/page/galeri');
});

Route::get('/berita', function () {
    return view('pengunjung/page/berita');
});

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbProfilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_profil', function (Blueprint $table) {
            $table->id();
            $table->string("nama_desa");
            $table->string("kecamatan");
            $table->string("kabupaten");
            $table->string("provinsi");
            $table->string("negara");
            $table->string("kode_pos");
            $table->text('deskripsi');
            $table->string('gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_profil');
    }
}

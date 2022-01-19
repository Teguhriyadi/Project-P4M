<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbSuratMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_surat_masuk', function (Blueprint $table) {
            $table->id();
            $table->integer("nomor_urut");
            $table->date("tanggal_penerimaan");
            $table->string("nomor_surat", 35)->nullable();
            $table->string("kode_surat", 10)->nullable();
            $table->date("tanggal_surat");
            $table->string("pengirim")->nullable();
            $table->string("isi_singkat")->nullable();
            $table->string("isi_disposisi")->nullable();
            $table->string("berkas_scan")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_surat_masuk');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbSuratKeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_surat_keluar', function (Blueprint $table) {
            $table->id();
            $table->integer("nomor_urut")->nullable();
            $table->string("nomor_surat", 50)->nullable();
            $table->string("kode_surat", 20)->nullable();
            $table->date("tanggal_surat")->nullable();
            $table->timestamp("tanggal_catat")->nullable();
            $table->string("tujuan", 100)->nullable();
            $table->string("isi_singkat")->nullable();
            $table->string("berkas_scan")->nullable();
            $table->date("tanggal_pengiriman")->nullable();
            $table->string("tanda_terima")->nullable();
            $table->text("keterangan")->nullable();
            $table->integer("created_by")->nullable();
            $table->integer("updated_by")->nullable();
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
        Schema::dropIfExists('tb_surat_keluar');
    }
}

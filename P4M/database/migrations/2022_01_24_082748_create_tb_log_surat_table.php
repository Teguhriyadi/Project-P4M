<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbLogSuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_log_surat', function (Blueprint $table) {
            $table->id();
            $table->integer('id_format_surat');
            $table->integer('id_penduduk')->nullable();
            $table->integer('id_pegawai');
            $table->integer('id_user');
            $table->timestamp('tanggal');
            $table->string('bulan', 2)->nullable();
            $table->string('tahun', 4)->nullable();
            $table->string('no_surat', 20)->nullable();
            $table->string('nama_surat', 100)->nullable();
            $table->string('nik_non_warga', 100)->nullable();
            $table->string('nama_non_warga', 100)->nullable();
            $table->string('keterangan', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_log_surat');
    }
}

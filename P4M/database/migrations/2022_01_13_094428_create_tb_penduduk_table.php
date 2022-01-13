<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPendudukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_penduduk', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('nik', 100);
            $table->string('kk_sebelumnya', 100);
            $table->integer('id_kk')->nullable();
            $table->integer('id_sex');
            $table->integer('id_hubungan');
            $table->string('tempat_lahir', 100);
            $table->date('tgl_lahir');
            $table->string('waktu_lahir', 10);
            $table->integer('id_agama');
            $table->integer('id_pendidikan');
            $table->integer('id_pekerjaan');
            $table->integer('status_kawin');
            $table->integer('id_warga_negara');
            $table->string('nik_ayah', 100);
            $table->string('nik_ibu', 100);
            $table->string('nama_ayah', 100);
            $table->string('nama_ibu', 100);
            $table->integer('id_golongan_darah')->nullable();
            $table->string('telepon', 15)->nullable();
            $table->integer('berat_lahir');
            $table->integer('panjang_lahir');
            $table->integer('kelahiran_ke');
            $table->integer('jumlah_saudara');
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
        Schema::dropIfExists('tb_penduduk');
    }
}

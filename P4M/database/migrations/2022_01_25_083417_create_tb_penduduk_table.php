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
            $table->string('nama', 100)->nullable();
            $table->string('nik', 100)->nullable();
            $table->string('kk_sebelumnya', 100)->nullable();
            $table->integer('id_kk')->nullable();
            $table->integer('kk_level')->nullable();
            $table->integer('id_sex')->nullable();
            $table->string('tempat_lahir', 100)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('waktu_lahir', 10)->nullable();
            $table->string('id_rtm', 30)->nullable();
            $table->integer('rtm_level')->default(0);
            $table->integer('id_agama')->nullable();
            $table->integer('id_pendidikan')->nullable();
            $table->integer('id_pendidikan_sedang')->nullable();
            $table->integer('id_pekerjaan')->nullable();
            $table->integer('status_kawin')->nullable();
            $table->integer('id_warga_negara')->nullable();
            $table->string('nik_ayah', 100)->nullable();
            $table->string('nik_ibu', 100)->nullable();
            $table->string('nama_ayah', 100)->nullable();
            $table->string('nama_ibu', 100)->nullable();
            $table->string('foto')->nullable();
            $table->integer('id_golongan_darah')->nullable();
            $table->string('telepon', 15)->nullable();
            $table->integer('id_dusun')->nullable();
            $table->integer('id_rt')->nullable();
            $table->integer('id_rw')->nullable();
            $table->integer('berat_lahir')->nullable();
            $table->integer('panjang_lahir')->nullable();
            $table->integer('kelahiran_ke')->nullable();
            $table->integer('jumlah_saudara')->nullable();
            $table->string('alamat_sebelumnya')->nullable();
            $table->string('alamat_sekarang')->nullable();
            $table->integer('id_cacat')->nullable();
            $table->integer('id_sakit_menahun')->nullable();
            $table->string('akta_lahir')->nullable();
            $table->string('akta_perkawinan')->nullable();
            $table->date('tanggal_perkawinan')->nullable();
            $table->string('akta_perceraian')->nullable();
            $table->date('tanggal_perceraian')->nullable();
            $table->tinyInteger('jenis_kelahiran')->nullable();
            $table->tinyInteger('created_by')->nullable();
            $table->tinyInteger('updated_by')->nullable();
            $table->string('tempat_cetak_ktp')->nullable();
            $table->date('tanggal_cetak_ktp')->nullable();
            $table->integer('id_status_dasar')->default(1)->nullable();
            $table->string('email')->nullable()->unique();
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

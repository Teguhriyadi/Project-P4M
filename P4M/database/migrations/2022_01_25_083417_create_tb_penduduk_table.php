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
            $table->foreignId('id_sex')->nullable()->constrained("tb_penduduk_sex")->cascadeOnUpdate()->nullOnDelete();
            $table->string('tempat_lahir', 100)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('waktu_lahir', 10)->nullable();
            $table->foreignId('id_rtm')->nullable()->constrained("tb_rtm")->cascadeOnUpdate()->nullOnDelete();
            $table->integer('rtm_level')->default(0);
            $table->foreignId('id_agama')->nullable()->constrained("tb_penduduk_agama")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('id_pendidikan')->nullable()->constrained("tb_penduduk_pendidikan")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('id_pendidikan_sedang')->nullable()->constrained("tb_penduduk_pendidikan")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('id_pekerjaan')->nullable()->constrained("tb_penduduk_pekerjaan")->cascadeOnUpdate()->nullOnDelete();
            $table->integer('status_kawin')->nullable();
            $table->foreignId('id_warga_negara')->nullable()->constrained("tb_penduduk_warga_negara")->cascadeOnUpdate()->nullOnDelete();
            $table->string('nik_ayah', 100)->nullable();
            $table->string('nik_ibu', 100)->nullable();
            $table->string('nama_ayah', 100)->nullable();
            $table->string('nama_ibu', 100)->nullable();
            $table->string('foto')->nullable();
            $table->foreignId('id_golongan_darah')->nullable()->constrained("tb_golongan_darah")->cascadeOnUpdate()->nullOnDelete();
            $table->string('telepon', 15)->nullable();
            $table->foreignId('id_dusun')->nullable()->constrained("tb_dusun")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('id_rt')->nullable()->constrained("tb_rt")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('id_rw')->nullable()->constrained("tb_rw")->cascadeOnUpdate()->nullOnDelete();
            $table->integer('berat_lahir')->nullable();
            $table->integer('panjang_lahir')->nullable();
            $table->integer('kelahiran_ke')->nullable();
            $table->integer('jumlah_saudara')->nullable();
            $table->string('alamat_sebelumnya')->nullable();
            $table->string('alamat_sekarang')->nullable();
            $table->foreignId('id_cacat')->nullable()->constrained("tb_cacat")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('id_sakit_menahun')->nullable()->constrained("tb_sakit_menahun")->cascadeOnUpdate()->nullOnDelete();
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
            $table->foreignId('id_status_dasar')->default(1)->nullable()->constrained("tb_status_dasar")->cascadeOnUpdate()->nullOnDelete();
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

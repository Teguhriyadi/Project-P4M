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
            $table->foreignId('id_format_surat')->nullable()->constrained("tb_surat_format")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('id_penduduk')->nullable()->constrained("tb_penduduk")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('id_pegawai')->nullable()->constrained("tb_pegawai")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('id_user')->nullable()->constrained("users")->cascadeOnUpdate()->nullOnDelete();
            $table->timestamp('tanggal');
            $table->string('bulan', 2)->nullable();
            $table->string('tahun', 4)->nullable();
            $table->string('no_surat', 20)->nullable();
            $table->string('nama_surat', 100)->nullable();
            $table->string('nik_non_warga', 100)->nullable();
            $table->string('nama_non_warga', 100)->nullable();
            $table->string('keterangan')->nullable();
            $table->string('keperluan')->nullable();
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

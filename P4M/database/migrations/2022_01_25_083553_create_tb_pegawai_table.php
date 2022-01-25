<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pegawai', function (Blueprint $table) {
            $table->id();
            $table->string("nama")->nullable();
            $table->string("nip")->nullable();
            $table->string("nik")->nullable()->unique();
            $table->enum("status", [1, 0]);
            $table->date("tgl_terdaftar")->nullable();
            $table->string("foto")->nullable();
            $table->foreignId("id_penduduk")->nullable()->constrained("tb_penduduk")->cascadeOnUpdate()->nullOnDelete();
            $table->string("tempat_lahir", 100)->nullable();
            $table->date("tgl_lahir")->nullable();
            $table->foreignId("sex")->nullable()->constrained("tb_penduduk_sex")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId("pendidikan")->nullable()->constrained("tb_penduduk_pendidikan")->cascadeOnUpdate()->nullOnDelete();
            $table->string("agama", 50)->nullable();
            $table->string("no_sk", 30)->nullable();
            $table->date("tgl_sk")->nullable();
            $table->string("masa_jabatan")->nullable();
            $table->string("pangkat", 20)->nullable();
            $table->string("no_henti", 20)->nullable();
            $table->date("tgl_henti")->nullable();
            $table->string("no_hp")->nullable();
            $table->text("alamat")->nullable();
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
        Schema::dropIfExists('tb_pegawai');
    }
}

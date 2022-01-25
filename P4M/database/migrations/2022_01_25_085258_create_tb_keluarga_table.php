<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbKeluargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_keluarga', function (Blueprint $table) {
            $table->id();
            $table->string("no_kk");
            $table->foreignId("nik_kepala")->nullable()->constrained("tb_penduduk")->cascadeOnUpdate()->nullOnDelete();
            $table->datetime("tgl_daftar");
            $table->integer("kelas_sosial")->nullable();
            $table->datetime("tgl_cetak_kk");
            $table->text("alamat");
            $table->integer("id_cluster");
            $table->datetime("updated_at");
            $table->integer("updated_by");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_keluarga');
    }
}

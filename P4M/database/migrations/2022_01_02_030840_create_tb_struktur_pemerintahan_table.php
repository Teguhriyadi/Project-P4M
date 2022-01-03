<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbStrukturPemerintahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_struktur_pemerintahan', function (Blueprint $table) {
            $table->id();
            $table->foreignId("jabatan_id");
            $table->foreignId("pegawai_id");
            $table->integer("staf_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_struktur_pemerintahan');
    }
}

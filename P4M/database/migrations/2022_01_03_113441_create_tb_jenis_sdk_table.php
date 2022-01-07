<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbJenisSdkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_jenis_sdk', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_organisasi');
            $table->string('jumlah_anggota');
            $table->string('lokasi');
            $table->integer('tahun_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_jenis_sdk');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonanSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_permohonan_surat', function (Blueprint $table) {
            $table->id();
            $table->integer('id_surat');
            $table->string('nik')->nullable();
            $table->string('nama')->nullable();
            $table->string('telepon')->nullable();
            $table->text('kebutuhan');
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
        Schema::dropIfExists('permohonan_surats');
    }
}

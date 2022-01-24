<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbSuratFormatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_surat_format', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->string("url_surat");
            $table->string("kode_surat");
            $table->string("akronim");
            $table->tinyInteger("kunci")->default(0);
            $table->tinyInteger("mandiri")->default(0);
            $table->integer("masa_berlaku")->default(1);
            $table->string("satuan_masa_berlaku", 15)->default("M");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_surat_format');
    }
}

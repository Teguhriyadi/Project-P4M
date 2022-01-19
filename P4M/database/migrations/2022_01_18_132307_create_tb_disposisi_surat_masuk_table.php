<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDisposisiSuratMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_disposisi_surat_masuk', function (Blueprint $table) {
            $table->id();
            $table->integer("id_surat_masuk");
            $table->integer("id_pegawai");
            $table->string("disposisi_ke", 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_disposisi_surat_masuk');
    }
}

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
            $table->foreignId("id_surat_masuk")->nullable()->constrained("tb_surat_masuk")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId("id_pegawai")->nullable()->constrained("tb_pegawai")->cascadeOnUpdate()->nullOnDelete();
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

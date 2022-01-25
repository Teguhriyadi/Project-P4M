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
            $table->string('id_balkan')->nullable();
            $table->foreignId("jabatan_id")->nullable()->constrained("tb_jabatan")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId("pegawai_id")->nullable()->constrained("tb_pegawai")->cascadeOnUpdate()->nullOnDelete();
            $table->integer("staf_id")->nullable();
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
        Schema::dropIfExists('tb_struktur_pemerintahan');
    }
}

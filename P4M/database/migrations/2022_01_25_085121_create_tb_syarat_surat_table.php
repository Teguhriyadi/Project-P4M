<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbSyaratSuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_syarat_surat', function (Blueprint $table) {
            $table->id();
            $table->foreignId("surat_format_id")->nullable()->constrained("tb_surat_format")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId("ref_syarat_id")->nullable()->constrained("tb_ref_syarat_surat")->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_syarat_surat');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbWilayahGeografisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_wilayah_geografis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('geografis_id')->nullable()->constrained("tb_geografis")->cascadeOnUpdate()->nullOnDelete();
            $table->string('batas', 100);
            $table->string('desa', 100);
            $table->string('kecamatan', 100);
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
        Schema::dropIfExists('tb_wilayah_geografis');
    }
}

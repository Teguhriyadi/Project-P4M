<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_program', function (Blueprint $table) {
            $table->id();
            $table->string("nama", 100);
            $table->tinyInteger("sasaran");
            $table->text("deskripsi");
            $table->date("tanggal_mulai");
            $table->date("tanggal_berakhir");
            $table->foreignId("user_id")->nullable()->constrained("users")->cascadeOnUpdate()->nullOnDelete();
            $table->tinyInteger("status")->default(0);
            $table->string("asal_dana");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_program');
    }
}

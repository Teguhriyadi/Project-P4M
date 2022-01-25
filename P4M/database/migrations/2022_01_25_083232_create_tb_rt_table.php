<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbRtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_rt', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rw')->nullable()->constrained("tb_rw")->cascadeOnUpdate()->nullOnDelete();
            $table->string('rt');
            $table->integer("id_pejabat")->nullable();
            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_rt');
    }
}

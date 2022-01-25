<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbCounterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_counter', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_artikel')->nullable()->constrained("tb_artikel")->cascadeOnUpdate()->nullOnDelete();
            $table->string('address', 50);
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
        Schema::dropIfExists('tb_counter');
    }
}

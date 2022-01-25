<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbKomentarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_komentar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_artikel')->nullable()->constrained("tb_artikel")->cascadeOnUpdate()->nullOnDelete();
            $table->string('nama');
            $table->string('email');
            $table->string('telepon');
            $table->text('pesan');
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
        Schema::dropIfExists('tb_komentar');
    }
}

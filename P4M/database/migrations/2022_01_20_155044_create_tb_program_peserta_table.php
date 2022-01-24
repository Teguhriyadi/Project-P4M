<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbProgramPesertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_program_peserta', function (Blueprint $table) {
            $table->id();
            $table->string('peserta', 30);
            $table->foreignId('program_id')->nullable()->constrained("tb_program")->cascadeOnUpdate()->nullOnDelete();
            $table->string('no_id_kartu', 30)->nullable();
            $table->string('kartu_nik', 30);
            $table->string('kartu_nama', 100);
            $table->string('kartu_tempat_lahir', 100);
            $table->date('kartu_tanggal_lahir');
            $table->text('kartu_alamat');
            $table->string('kartu_peserta');
            $table->foreignId('kartu_id_penduduk')->nullable()->constrained("tb_penduduk")->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_program_peserta');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAfterCekKrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('after_cek_krs', function (Blueprint $table) {
            $table->id();
            $table->string('id_mhs');
            $table->string('id_pa')->nullable();
            $table->string('id_matkul');
            $table->string('nama_matkul');
            $table->string('sks');
            $table->string('nilai_huruf')->nullable();
            $table->string('semester');
            $table->string('periode_semester');
            $table->string('status_validasi')->nullable();
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
        Schema::dropIfExists('after_cek_krs');
    }
}

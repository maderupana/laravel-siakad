<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('tmpt_lahir');
            $table->string('nik');
            $table->date('tgl_lahir');
            $table->string('agama');
            $table->string('kewarganegaraan');
            $table->string('jk', 2);
            $table->text('alamat');
            $table->string('pekerjaan');
            $table->string('no_tlf');
            $table->string('asal_sekolah');
            $table->text('alamat_sekolah');
            $table->year('tahun_tamat');
            $table->string('nilai_skhun');
            $table->string('jurusan');
            $table->string('kelas');
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
        Schema::dropIfExists('profiles');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranPendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('jumlah_bayar');
            $table->string('nama_bank');
            $table->string('an_bank');
            $table->date('tgl_bayar');
            $table->boolean('validasi')->default(0);
            $table->string('bukti_bayar');
            $table->text('catatan')->nullable();
            $table->string('recomend')->nullable();
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
        Schema::dropIfExists('pembayaran_pendaftarans');
    }
}

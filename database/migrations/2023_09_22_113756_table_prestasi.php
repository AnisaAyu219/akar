<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablePrestasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('prestasi', function (Blueprint $table) {
            $table->string('sertifikat'); // Kolom id yang akan menjadi primary key
            $table->string('bidang');
            $table->string('tahun_diperoleh');
            $table->unsignedBigInteger('nim');
            $table->foreign('nim')->references('nim')->on('mahasiswa');
            $table->id('id_prestasi');
            $table->string('nama');
            $table->bigInteger('id_pengubah')->nullable();
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

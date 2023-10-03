<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablePelatihan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelatihan', function (Blueprint $table) {
            $table->id('id_pelatihan'); // Kolom id yang akan menjadi primary key
            $table->string('bidang');
            $table->string('deskripsi');
            $table->string('nama');
            $table->string('tahun_pelaksanaan');
            $table->unsignedBigInteger('nim');
            $table->foreign('nim')->references('nim')->on('mahasiswa');
            $table->string('sertifikat'); // Kolom nama
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

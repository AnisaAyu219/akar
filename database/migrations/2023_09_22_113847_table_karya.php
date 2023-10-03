<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableKarya extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karya', function (Blueprint $table) {
            $table->string('deskripsi'); // Kolom id yang akan menjadi primary key
            $table->string('dokumentasi');
            $table->string('link_karya');
            $table->string('nama');
            $table->id('id_karya');
            $table->string('bidang');
            $table->unsignedBigInteger('nim');
            $table->foreign('nim')->references('nim')->on('mahasiswa');
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

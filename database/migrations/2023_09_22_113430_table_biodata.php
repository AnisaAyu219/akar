<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableBiodata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata', function (Blueprint $table) {
            $table->id('id_biodata'); // Kolom id yang akan menjadi primary key
            $table->unsignedBigInteger('nim');
            $table->foreign('nim')->references('nim')->on('mahasiswa');
            $table->string('pengalaman_kerja');
            $table->binary('foto_profile');
            $table->string('profile_singkat');
            $table->string('skill');
            $table->string('riwayat_pendidikan'); // Kolom nama
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

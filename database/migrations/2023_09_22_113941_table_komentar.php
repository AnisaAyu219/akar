<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableKomentar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar', function (Blueprint $table) {
            $table->id('id_komentar'); // Kolom id yang akan menjadi primary key
            $table->unsignedBigInteger('id_karya');
            $table->foreign('id_karya')->references('id_karya')->on('karya');
            $table->string('isi');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenumpangsTable extends Migration
{
    public function up()
    {
        Schema::create('penumpangs', function (Blueprint $table) {
            $table->id('id_penumpang');
            $table->unsignedBigInteger('tiket_id');
            $table->string('nama_penumpang');
            $table->string('nomor_passport');
            $table->string('domisili');
            $table->string('jenis_kelamin');
            $table->date('tanggal_lahir');
            $table->timestamps();

            $table->foreign('tiket_id')->references('id_tiket')->on('tickets')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('penumpangs');
    }
}

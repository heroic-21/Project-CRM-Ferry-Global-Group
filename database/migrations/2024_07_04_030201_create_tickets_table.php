<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id('id_tiket');
            $table->unsignedBigInteger('id');
            $table->string('from');
            $table->string('to');
            $table->string('way');
            $table->string('jenis_pembayaran');
            $table->string('kelas_tiket');
            $table->date('deparature_date');
            $table->time('deparature_time');
            $table->string('status_tiket');
            $table->timestamps();

            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodeRekuringsTable extends Migration
{
    public function up()
    {
        Schema::create('periode_rekurings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode');
            $table->string('keterangan');
            $table->string('faktor_pengali');
            $table->integer('nilai_pengali');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

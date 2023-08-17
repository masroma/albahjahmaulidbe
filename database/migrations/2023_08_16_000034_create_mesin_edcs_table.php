<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMesinEdcsTable extends Migration
{
    public function up()
    {
        Schema::create('mesin_edcs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_edc');
            $table->string('nama_edc');
            $table->string('bank')->nullable();
            $table->string('cabang')->nullable();
            $table->longText('keterangan')->nullable();
            $table->boolean('aktif')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

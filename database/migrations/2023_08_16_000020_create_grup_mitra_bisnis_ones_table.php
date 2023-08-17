<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupMitraBisnisOnesTable extends Migration
{
    public function up()
    {
        Schema::create('grup_mitra_bisnis_ones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode');
            $table->string('keterangan')->nullable();
            $table->string('level')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChannelsTable extends Migration
{
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode');
            $table->string('nama');
            $table->string('warna')->nullable();
            $table->boolean('aktif')->default(0)->nullable();
            $table->boolean('tampil_di_pos')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

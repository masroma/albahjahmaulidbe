<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerminalKasirsTable extends Migration
{
    public function up()
    {
        Schema::create('terminal_kasirs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_pos');
            $table->string('nama');
            $table->string('cabang')->nullable();
            $table->string('gudang')->nullable();
            $table->string('kas_kasir')->nullable();
            $table->string('kas_setor')->nullable();
            $table->boolean('aktif')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

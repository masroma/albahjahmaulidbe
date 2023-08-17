<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkunKlasifikasisTable extends Migration
{
    public function up()
    {
        Schema::create('akun_klasifikasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode')->unique();
            $table->string('nama');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

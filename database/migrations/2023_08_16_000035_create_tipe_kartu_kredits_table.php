<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipeKartuKreditsTable extends Migration
{
    public function up()
    {
        Schema::create('tipe_kartu_kredits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode');
            $table->string('nama_kartu_kredit');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

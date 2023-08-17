<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontakMitraBisnisTable extends Migration
{
    public function up()
    {
        Schema::create('kontak_mitra_bisnis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_kontak')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('handphone')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

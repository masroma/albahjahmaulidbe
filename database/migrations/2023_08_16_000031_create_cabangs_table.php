<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabangsTable extends Migration
{
    public function up()
    {
        Schema::create('cabangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode')->unique();
            $table->string('nama');
            $table->string('nama_perusahaan_cabang')->nullable();
            $table->string('alamat')->nullable();
            $table->string('telephone')->nullable();
            $table->string('fax')->nullable();
            $table->string('npwp')->nullable();
            $table->string('pkp')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlamatMitraBisnisTable extends Migration
{
    public function up()
    {
        Schema::create('alamat_mitra_bisnis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('keterangan_alamat')->nullable();
            $table->longText('alamat_lengkap')->nullable();
            $table->string('telepon')->nullable();
            $table->string('fax')->nullable();
            $table->string('kode_pos')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

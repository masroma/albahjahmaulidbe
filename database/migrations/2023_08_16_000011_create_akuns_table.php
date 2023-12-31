<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkunsTable extends Migration
{
    public function up()
    {
        Schema::create('akuns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('akun_kode')->unique();
            $table->string('akun_nama');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

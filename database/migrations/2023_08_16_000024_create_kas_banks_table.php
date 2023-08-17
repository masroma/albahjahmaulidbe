<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasBanksTable extends Migration
{
    public function up()
    {
        Schema::create('kas_banks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode');
            $table->string('tipe_kas')->nullable();
            $table->string('akun');
            $table->string('nama');
            $table->string('mata_uang');
            $table->integer('saldo')->nullable();
            $table->integer('tot_giro_keluar');
            $table->boolean('aktif')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

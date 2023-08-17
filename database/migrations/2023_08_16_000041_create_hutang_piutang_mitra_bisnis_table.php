<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHutangPiutangMitraBisnisTable extends Migration
{
    public function up()
    {
        Schema::create('hutang_piutang_mitra_bisnis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pembelian_termin')->nullable();
            $table->string('pembelian_tempo')->nullable();
            $table->string('penjualan_termin')->nullable();
            $table->string('penjualan_tempo')->nullable();
            $table->string('batas_hutang')->nullable();
            $table->string('batas_frekuensi_hutang')->nullable();
            $table->string('batas_piutang')->nullable();
            $table->string('batas_frekuensi_piutang')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

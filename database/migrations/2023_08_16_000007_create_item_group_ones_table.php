<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemGroupOnesTable extends Migration
{
    public function up()
    {
        Schema::create('item_group_ones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode');
            $table->string('nama');
            $table->string('item_type');
            $table->string('akun_pembelian')->nullable();
            $table->string('akun_hpp')->nullable();
            $table->string('akun_penjualan')->nullable();
            $table->string('akun_retur_penjualan')->nullable();
            $table->boolean('tampil_pos')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

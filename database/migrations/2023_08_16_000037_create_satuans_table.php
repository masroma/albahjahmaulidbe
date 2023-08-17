<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSatuansTable extends Migration
{
    public function up()
    {
        Schema::create('satuans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('satuan_1')->nullable();
            $table->string('satuan_2')->nullable();
            $table->string('isi_2')->nullable();
            $table->string('satuan_3')->nullable();
            $table->string('isi_3')->nullable();
            $table->string('satuan_pembelian')->nullable();
            $table->string('satuan_penjualan')->nullable();
            $table->string('satuan_stok')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

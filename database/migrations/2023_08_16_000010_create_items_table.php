<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item_kode')->unique();
            $table->string('item_nama');
            $table->string('barcode')->nullable();
            $table->boolean('item_akun_aktif')->default(0)->nullable();
            $table->string('status');
            $table->string('item_alias_nama')->nullable();
            $table->integer('item_satuan_one')->nullable();
            $table->integer('item_satuan_two')->nullable();
            $table->integer('item_satuan_three')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

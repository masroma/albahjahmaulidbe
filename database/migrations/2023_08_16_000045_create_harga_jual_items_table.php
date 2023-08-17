<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHargaJualItemsTable extends Migration
{
    public function up()
    {
        Schema::create('harga_jual_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('harga_satuan_1')->nullable();
            $table->string('diskon_satuan_1')->nullable();
            $table->string('harga_satuan_2')->nullable();
            $table->string('diskon_satuan_2')->nullable();
            $table->string('harga_satuan_3')->nullable();
            $table->string('diskon_satuan_3')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

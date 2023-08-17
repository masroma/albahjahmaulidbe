<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemSatuanPivotTable extends Migration
{
    public function up()
    {
        Schema::create('item_satuan', function (Blueprint $table) {
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id', 'item_id_fk_7025051')->references('id')->on('items')->onDelete('cascade');
            $table->unsignedBigInteger('satuan_id');
            $table->foreign('satuan_id', 'satuan_id_fk_7025051')->references('id')->on('satuans')->onDelete('cascade');
        });
    }
}

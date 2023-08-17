<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToHargaJualItemsTable extends Migration
{
    public function up()
    {
        Schema::table('harga_jual_items', function (Blueprint $table) {
            $table->unsignedBigInteger('item_id')->nullable();
            $table->foreign('item_id', 'item_fk_7030553')->references('id')->on('items');
            $table->unsignedBigInteger('level_harga_id')->nullable();
            $table->foreign('level_harga_id', 'level_harga_fk_7030554')->references('id')->on('level_hargas');
            $table->unsignedBigInteger('mata_uang_id')->nullable();
            $table->foreign('mata_uang_id', 'mata_uang_fk_7030555')->references('id')->on('mata_uangs');
        });
    }
}

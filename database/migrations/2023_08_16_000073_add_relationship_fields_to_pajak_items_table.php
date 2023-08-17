<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPajakItemsTable extends Migration
{
    public function up()
    {
        Schema::table('pajak_items', function (Blueprint $table) {
            $table->unsignedBigInteger('item_id')->nullable();
            $table->foreign('item_id', 'item_fk_7030525')->references('id')->on('items');
            $table->unsignedBigInteger('pajak_id')->nullable();
            $table->foreign('pajak_id', 'pajak_fk_7030526')->references('id')->on('pajaks');
        });
    }
}

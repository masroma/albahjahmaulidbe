<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToStokItemsTable extends Migration
{
    public function up()
    {
        Schema::table('stok_items', function (Blueprint $table) {
            $table->unsignedBigInteger('item_id')->nullable();
            $table->foreign('item_id', 'item_fk_7030463')->references('id')->on('items');
        });
    }
}

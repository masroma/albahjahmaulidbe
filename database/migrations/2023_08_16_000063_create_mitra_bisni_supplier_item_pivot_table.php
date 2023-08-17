<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMitraBisniSupplierItemPivotTable extends Migration
{
    public function up()
    {
        Schema::create('mitra_bisni_supplier_item', function (Blueprint $table) {
            $table->unsignedBigInteger('supplier_item_id');
            $table->foreign('supplier_item_id', 'supplier_item_id_fk_7024969')->references('id')->on('supplier_items')->onDelete('cascade');
            $table->unsignedBigInteger('mitra_bisni_id');
            $table->foreign('mitra_bisni_id', 'mitra_bisni_id_fk_7024969')->references('id')->on('mitra_bisnis')->onDelete('cascade');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierItemsTable extends Migration
{
    public function up()
    {
        Schema::create('supplier_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_barang_supplier')->nullable();
            $table->string('lama_pemesanan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

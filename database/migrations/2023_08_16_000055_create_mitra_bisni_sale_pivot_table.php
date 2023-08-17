<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMitraBisniSalePivotTable extends Migration
{
    public function up()
    {
        Schema::create('mitra_bisni_sale', function (Blueprint $table) {
            $table->unsignedBigInteger('mitra_bisni_id');
            $table->foreign('mitra_bisni_id', 'mitra_bisni_id_fk_7024741')->references('id')->on('mitra_bisnis')->onDelete('cascade');
            $table->unsignedBigInteger('sale_id');
            $table->foreign('sale_id', 'sale_id_fk_7024741')->references('id')->on('sales')->onDelete('cascade');
        });
    }
}

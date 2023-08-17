<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelHargaMitraBisniPivotTable extends Migration
{
    public function up()
    {
        Schema::create('level_harga_mitra_bisni', function (Blueprint $table) {
            $table->unsignedBigInteger('mitra_bisni_id');
            $table->foreign('mitra_bisni_id', 'mitra_bisni_id_fk_7024740')->references('id')->on('mitra_bisnis')->onDelete('cascade');
            $table->unsignedBigInteger('level_harga_id');
            $table->foreign('level_harga_id', 'level_harga_id_fk_7024740')->references('id')->on('level_hargas')->onDelete('cascade');
        });
    }
}

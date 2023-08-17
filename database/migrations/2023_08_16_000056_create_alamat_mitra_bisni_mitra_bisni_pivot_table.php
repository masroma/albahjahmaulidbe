<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlamatMitraBisniMitraBisniPivotTable extends Migration
{
    public function up()
    {
        Schema::create('alamat_mitra_bisni_mitra_bisni', function (Blueprint $table) {
            $table->unsignedBigInteger('alamat_mitra_bisni_id');
            $table->foreign('alamat_mitra_bisni_id', 'alamat_mitra_bisni_id_fk_7024841')->references('id')->on('alamat_mitra_bisnis')->onDelete('cascade');
            $table->unsignedBigInteger('mitra_bisni_id');
            $table->foreign('mitra_bisni_id', 'mitra_bisni_id_fk_7024841')->references('id')->on('mitra_bisnis')->onDelete('cascade');
        });
    }
}

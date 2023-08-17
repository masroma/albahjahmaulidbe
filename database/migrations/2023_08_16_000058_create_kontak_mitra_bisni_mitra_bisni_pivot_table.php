<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontakMitraBisniMitraBisniPivotTable extends Migration
{
    public function up()
    {
        Schema::create('kontak_mitra_bisni_mitra_bisni', function (Blueprint $table) {
            $table->unsignedBigInteger('kontak_mitra_bisni_id');
            $table->foreign('kontak_mitra_bisni_id', 'kontak_mitra_bisni_id_fk_7024852')->references('id')->on('kontak_mitra_bisnis')->onDelete('cascade');
            $table->unsignedBigInteger('mitra_bisni_id');
            $table->foreign('mitra_bisni_id', 'mitra_bisni_id_fk_7024852')->references('id')->on('mitra_bisnis')->onDelete('cascade');
        });
    }
}

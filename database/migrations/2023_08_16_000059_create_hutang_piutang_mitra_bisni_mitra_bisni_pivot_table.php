<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHutangPiutangMitraBisniMitraBisniPivotTable extends Migration
{
    public function up()
    {
        Schema::create('hutang_piutang_mitra_bisni_mitra_bisni', function (Blueprint $table) {
            $table->unsignedBigInteger('hutang_piutang_mitra_bisni_id');
            $table->foreign('hutang_piutang_mitra_bisni_id', 'hutang_piutang_mitra_bisni_id_fk_7024920')->references('id')->on('hutang_piutang_mitra_bisnis')->onDelete('cascade');
            $table->unsignedBigInteger('mitra_bisni_id');
            $table->foreign('mitra_bisni_id', 'mitra_bisni_id_fk_7024920')->references('id')->on('mitra_bisnis')->onDelete('cascade');
        });
    }
}

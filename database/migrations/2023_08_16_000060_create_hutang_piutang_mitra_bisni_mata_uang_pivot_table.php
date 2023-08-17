<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHutangPiutangMitraBisniMataUangPivotTable extends Migration
{
    public function up()
    {
        Schema::create('hutang_piutang_mitra_bisni_mata_uang', function (Blueprint $table) {
            $table->unsignedBigInteger('hutang_piutang_mitra_bisni_id');
            $table->foreign('hutang_piutang_mitra_bisni_id', 'hutang_piutang_mitra_bisni_id_fk_7024921')->references('id')->on('hutang_piutang_mitra_bisnis')->onDelete('cascade');
            $table->unsignedBigInteger('mata_uang_id');
            $table->foreign('mata_uang_id', 'mata_uang_id_fk_7024921')->references('id')->on('mata_uangs')->onDelete('cascade');
        });
    }
}

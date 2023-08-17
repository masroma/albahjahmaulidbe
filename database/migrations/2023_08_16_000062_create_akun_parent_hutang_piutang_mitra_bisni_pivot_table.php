<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkunParentHutangPiutangMitraBisniPivotTable extends Migration
{
    public function up()
    {
        Schema::create('akun_parent_hutang_piutang_mitra_bisni', function (Blueprint $table) {
            $table->unsignedBigInteger('hutang_piutang_mitra_bisni_id');
            $table->foreign('hutang_piutang_mitra_bisni_id', 'hutang_piutang_mitra_bisni_id_fk_7024931')->references('id')->on('hutang_piutang_mitra_bisnis')->onDelete('cascade');
            $table->unsignedBigInteger('akun_parent_id');
            $table->foreign('akun_parent_id', 'akun_parent_id_fk_7024931')->references('id')->on('akun_parents')->onDelete('cascade');
        });
    }
}

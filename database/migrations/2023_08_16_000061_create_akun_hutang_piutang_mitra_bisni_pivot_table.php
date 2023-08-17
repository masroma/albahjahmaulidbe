<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkunHutangPiutangMitraBisniPivotTable extends Migration
{
    public function up()
    {
        Schema::create('akun_hutang_piutang_mitra_bisni', function (Blueprint $table) {
            $table->unsignedBigInteger('hutang_piutang_mitra_bisni_id');
            $table->foreign('hutang_piutang_mitra_bisni_id', 'hutang_piutang_mitra_bisni_id_fk_7024928')->references('id')->on('hutang_piutang_mitra_bisnis')->onDelete('cascade');
            $table->unsignedBigInteger('akun_id');
            $table->foreign('akun_id', 'akun_id_fk_7024928')->references('id')->on('akuns')->onDelete('cascade');
        });
    }
}

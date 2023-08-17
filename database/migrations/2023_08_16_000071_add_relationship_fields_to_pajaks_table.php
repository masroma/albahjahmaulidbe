<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPajaksTable extends Migration
{
    public function up()
    {
        Schema::table('pajaks', function (Blueprint $table) {
            $table->unsignedBigInteger('akun_pembelian_id')->nullable();
            $table->foreign('akun_pembelian_id', 'akun_pembelian_fk_6992959')->references('id')->on('akuns');
            $table->unsignedBigInteger('akun_penjualan_id')->nullable();
            $table->foreign('akun_penjualan_id', 'akun_penjualan_fk_6992960')->references('id')->on('akuns');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToItemsTable extends Migration
{
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->unsignedBigInteger('item_merk_id')->nullable();
            $table->foreign('item_merk_id', 'item_merk_fk_6921970')->references('id')->on('mark_items');
            $table->unsignedBigInteger('item_group_one_id')->nullable();
            $table->foreign('item_group_one_id', 'item_group_one_fk_6921971')->references('id')->on('item_group_ones');
            $table->unsignedBigInteger('item_group_two_id')->nullable();
            $table->foreign('item_group_two_id', 'item_group_two_fk_6921972')->references('id')->on('item_group_twos');
            $table->unsignedBigInteger('item_group_three_id')->nullable();
            $table->foreign('item_group_three_id', 'item_group_three_fk_6921973')->references('id')->on('item_group_threes');
            $table->unsignedBigInteger('item_akun_pembelian_id')->nullable();
            $table->foreign('item_akun_pembelian_id', 'item_akun_pembelian_fk_6935093')->references('id')->on('akuns');
            $table->unsignedBigInteger('item_akun_hpp_id')->nullable();
            $table->foreign('item_akun_hpp_id', 'item_akun_hpp_fk_6935094')->references('id')->on('akuns');
            $table->unsignedBigInteger('item_akun_penjualan_id')->nullable();
            $table->foreign('item_akun_penjualan_id', 'item_akun_penjualan_fk_6935095')->references('id')->on('akuns');
            $table->unsignedBigInteger('item_akun_return_penjualan_id')->nullable();
            $table->foreign('item_akun_return_penjualan_id', 'item_akun_return_penjualan_fk_6935096')->references('id')->on('akuns');
        });
    }
}

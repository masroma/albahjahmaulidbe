<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMitraBisnisTable extends Migration
{
    public function up()
    {
        Schema::create('mitra_bisnis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode');
            $table->string('nama');
            $table->longText('deskripsi')->nullable();
            $table->boolean('aktif')->default(0)->nullable();
            $table->boolean('tipe_bisnis_customer')->default(0)->nullable();
            $table->boolean('tipe_bisnis_supplier')->default(0)->nullable();
            $table->string('bank')->nullable();
            $table->string('no_rekening')->nullable();
            $table->string('atas_nama')->nullable();
            $table->string('npwp')->nullable();
            $table->string('pkp')->nullable();
            $table->string('tanggal_pkp')->nullable();
            $table->string('no_nik')->nullable();
            $table->string('atas_nama_nik')->nullable();
            $table->boolean('pembelian_pajak')->default(0)->nullable();
            $table->boolean('penjualan_pajak')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

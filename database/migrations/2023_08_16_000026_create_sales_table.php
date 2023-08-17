<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode')->unique();
            $table->string('nama');
            $table->string('alamat');
            $table->string('kode_pos')->nullable();
            $table->string('telephone')->nullable();
            $table->string('handphone');
            $table->string('email')->nullable();
            $table->boolean('aktif')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

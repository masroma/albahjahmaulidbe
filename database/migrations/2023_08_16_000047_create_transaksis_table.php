<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice')->nullable();
            $table->integer('peserta')->nullable();
            $table->decimal('amount', 15, 2)->nullable();
            $table->integer('status')->nullable();
            $table->string('snap_token')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

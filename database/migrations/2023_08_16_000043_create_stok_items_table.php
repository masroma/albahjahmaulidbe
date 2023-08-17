<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokItemsTable extends Migration
{
    public function up()
    {
        Schema::create('stok_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('location')->nullable();
            $table->string('qty')->nullable();
            $table->string('pid')->nullable();
            $table->string('hpp')->nullable();
            $table->string('min')->nullable();
            $table->string('max')->nullable();
            $table->string('re_order')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

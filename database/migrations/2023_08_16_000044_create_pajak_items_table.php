<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePajakItemsTable extends Migration
{
    public function up()
    {
        Schema::create('pajak_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('perhitungan')->nullable();
            $table->string('tipe_pajak_item')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

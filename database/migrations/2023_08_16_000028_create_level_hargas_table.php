<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelHargasTable extends Migration
{
    public function up()
    {
        Schema::create('level_hargas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('keterangan');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePabriksTable extends Migration
{
    public function up()
    {
        Schema::create('pabriks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_pabrik');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

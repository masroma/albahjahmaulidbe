<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMataUangsTable extends Migration
{
    public function up()
    {
        Schema::create('mata_uangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode')->unique();
            $table->string('mata_uang');
            $table->string('simbol');
            $table->string('kurs')->nullable();
            $table->string('fiskal')->nullable();
            $table->string('rate_type')->nullable();
            $table->boolean('default')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

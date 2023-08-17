<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePajaksTable extends Migration
{
    public function up()
    {
        Schema::create('pajaks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode')->unique();
            $table->string('nama_pajak');
            $table->string('presentasi_npwp');
            $table->string('presentasi_non_npwp')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

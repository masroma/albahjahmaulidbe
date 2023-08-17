<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPenagihsTable extends Migration
{
    public function up()
    {
        Schema::table('penagihs', function (Blueprint $table) {
            $table->unsignedBigInteger('kode_kota_id')->nullable();
            $table->foreign('kode_kota_id', 'kode_kota_fk_6990448')->references('id')->on('kota');
        });
    }
}

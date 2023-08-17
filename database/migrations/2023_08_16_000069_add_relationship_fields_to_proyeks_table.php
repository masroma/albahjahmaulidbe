<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProyeksTable extends Migration
{
    public function up()
    {
        Schema::table('proyeks', function (Blueprint $table) {
            $table->unsignedBigInteger('pegawai_id')->nullable();
            $table->foreign('pegawai_id', 'pegawai_fk_6990469')->references('id')->on('pegawais');
            $table->unsignedBigInteger('mitra_bisnis_id')->nullable();
            $table->foreign('mitra_bisnis_id', 'mitra_bisnis_fk_6990470')->references('id')->on('grup_mitra_bisnis_ones');
        });
    }
}

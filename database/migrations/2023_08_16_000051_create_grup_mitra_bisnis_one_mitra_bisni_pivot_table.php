<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupMitraBisnisOneMitraBisniPivotTable extends Migration
{
    public function up()
    {
        Schema::create('grup_mitra_bisnis_one_mitra_bisni', function (Blueprint $table) {
            $table->unsignedBigInteger('mitra_bisni_id');
            $table->foreign('mitra_bisni_id', 'mitra_bisni_id_fk_7024737')->references('id')->on('mitra_bisnis')->onDelete('cascade');
            $table->unsignedBigInteger('grup_mitra_bisnis_one_id');
            $table->foreign('grup_mitra_bisnis_one_id', 'grup_mitra_bisnis_one_id_fk_7024737')->references('id')->on('grup_mitra_bisnis_ones')->onDelete('cascade');
        });
    }
}

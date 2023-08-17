<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlamatMitraBisniKotumPivotTable extends Migration
{
    public function up()
    {
        Schema::create('alamat_mitra_bisni_kotum', function (Blueprint $table) {
            $table->unsignedBigInteger('alamat_mitra_bisni_id');
            $table->foreign('alamat_mitra_bisni_id', 'alamat_mitra_bisni_id_fk_7024844')->references('id')->on('alamat_mitra_bisnis')->onDelete('cascade');
            $table->unsignedBigInteger('kotum_id');
            $table->foreign('kotum_id', 'kotum_id_fk_7024844')->references('id')->on('kota')->onDelete('cascade');
        });
    }
}

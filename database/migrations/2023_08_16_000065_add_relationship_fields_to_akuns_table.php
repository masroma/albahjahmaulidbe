<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAkunsTable extends Migration
{
    public function up()
    {
        Schema::table('akuns', function (Blueprint $table) {
            $table->unsignedBigInteger('akun_parent_id')->nullable();
            $table->foreign('akun_parent_id', 'akun_parent_fk_6935005')->references('id')->on('akun_parents');
            $table->unsignedBigInteger('akun_jenis_id')->nullable();
            $table->foreign('akun_jenis_id', 'akun_jenis_fk_6935030')->references('id')->on('akun_jenis');
            $table->unsignedBigInteger('akun_klasifikasi_id')->nullable();
            $table->foreign('akun_klasifikasi_id', 'akun_klasifikasi_fk_6935053')->references('id')->on('akun_klasifikasis');
        });
    }
}

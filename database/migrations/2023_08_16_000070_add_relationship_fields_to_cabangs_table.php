<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCabangsTable extends Migration
{
    public function up()
    {
        Schema::table('cabangs', function (Blueprint $table) {
            $table->unsignedBigInteger('default_customer_id')->nullable();
            $table->foreign('default_customer_id', 'default_customer_fk_6992951')->references('id')->on('tests');
        });
    }
}

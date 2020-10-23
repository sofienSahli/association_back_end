<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Species extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //      'name', 'description','isFone'

              Schema::create('species', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('isFone');
            $table->string('description');
       
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

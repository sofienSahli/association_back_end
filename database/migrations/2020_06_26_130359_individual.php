<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Individual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //      'name', 'description','species_id'

    
                Schema::create('individuals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('species_id')->unsigned();
            $table->foreign('species_id')->references('id')->on('species');
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

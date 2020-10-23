<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Events extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        //        'title', 'description','prposed_by_id', 'starting_date', 'place','description','longitude','latitude','theme','duration'
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->integer('prposed_by')->unsigned();
            $table->foreign('prposed_by')->references('id')->on('users');
            $table->date('starting_date');
            $table->string('place');
            $table->double('longitude');
            $table->double('latitude');
            $table->string('theme');
            $table->boolean('is_allowed')->default('false');
            $table->string('duration');
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

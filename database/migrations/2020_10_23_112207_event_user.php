<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //        'inscrit', 'event', 'is_confirmed'
        Schema::create('eventusers', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('inscrit')->unsigned();
            $table->foreign('inscrit')->references('id')->on('users');
            $table->integer('event')->unsigned();
            $table->foreign('event')->references('id')->on('events');
            $table->boolean('is_confirmed')->default(false);
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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Circuits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //      'title', 'description','difficulte','latitude','duree','user_id'

              Schema::create('circuits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
                        $table->string('description');
                        $table->string('difficulte');
                        $table->double('latitude');
                        $table->double('longitude');
                        $table->time('duree');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
       
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

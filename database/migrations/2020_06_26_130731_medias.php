<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Medias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //      'type', 'file','owner_id','owner_type'

          Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('file');
            $table->morphs('filable');
            $table->integer('filable_id')->unsigned();
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

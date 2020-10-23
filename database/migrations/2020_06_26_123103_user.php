<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     //   'first_name', 'last_name','phone','role', 'email', 'password','birth_date','isActive','activation_code'

    public function up()
    {
          Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email', '250');
            $table->integer('phone');
            $table->string('password');
            $table->string('role');
            $table->date('birth_date');
            $table->string('activation_code');
            $table->boolean('isActive')->default(false);
            $table->rememberToken();
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

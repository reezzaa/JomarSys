<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserlevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('userlevel', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('intUserID')->unsigned();
            $table->string('strLUserDesc');
            $table->string('strLUserRoute');
            $table->string('email',100)->unique();
            $table->string('password');
            $table->foreign('intUserID')->references('id')->on('users');
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
        Schema::dropIfExists('userlevel');
    }
}

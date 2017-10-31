<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUseraccessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('useraccess', function (Blueprint $table) {
            $table->integer('users_id')->unsigned();
            $table->integer('userlevel_id')->unsigned();
            $table->boolean('is_active');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('userlevel_id')->references('id')->on('userlevel');
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

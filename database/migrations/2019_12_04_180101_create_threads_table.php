<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            // store how many times this thread has been loaded to a view page
            $table->bigInteger('views')->unsigned()->default(0);
            // Variable to store topic name aka title aka topic aka subject
            $table->string('name');
            // Id for the creator of the thread
            $table->bigInteger('user_id')->unsigned()->nullable();

            // Thread key constraint, thread can have one user who created
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('threads');
    }
}

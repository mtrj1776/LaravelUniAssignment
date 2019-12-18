<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            // Variable for storing post comment string
            $table->string('post_comment')->str_limit(255)->nullable();
            
            // Store User who created post
            $table->bigInteger('user_id')->unsigned()->nullable();

            // User who created post contraint key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            
            // Variable to store thread id that post belongs to
            $table->bigInteger('thread_id')->unsigned();
            // Thread post belongs to key constraint
            $table->foreign('thread_id')->references('id')->on('threads')->onDelete('cascade')->onUpdate('cascade');
                            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

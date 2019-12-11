<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostUserTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Pivot Table for many to many relationship between post and user
        Schema::create('post_user', function (Blueprint $table) {
            
            $table->timestamps();

            // Primary key to allow likes to be counted for multiple users across multiple posts
            $table->primary(['post_id', 'user_id']);

            // User id for many to many relationship
            $table->bigInteger('user_id')->unsigned();
            // user id key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            // Post id for many to many relationship
            $table->bigInteger('post_id')->unsigned();
            // post id key constraint
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /*
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_user');
    }
}
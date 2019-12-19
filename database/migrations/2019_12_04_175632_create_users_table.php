<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('display_name')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            // User Roles
            $table->enum('permission_level',['administrator', 'user']);
            // User Multi Auth values
            $table->boolean('canCreate')->default(1);
            $table->boolean('canEdit')->default(0);
            $table->boolean('canDelete')->default(0);

            $table->rememberToken();
            // required so external provided account does not overwrite the table user_id
            $table->string('external_id')->nullable();
            $table->timestamps();
            // User also has a signature assigned to it, auto deletes through relationships
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

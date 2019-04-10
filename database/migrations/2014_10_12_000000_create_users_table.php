<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user', function (Blueprint $table) {
            $table->bigIncrements('userID');
            $table->string('username', 255);
            $table->string('email', 255);
            $table->string('password', 255);
            $table->timestamp('birthdate')->nullable();
            $table->integer('genderID')->nullable();
            $table->string('imagePath', 255)->nullable();
            $table->string('status', 10)->default('member');
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();            
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
        Schema::dropIfExists('tbl_user');
    }
}

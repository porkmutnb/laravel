<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user_detail', function (Blueprint $table) {
            $table->bigIncrements('userDetailID');
            $table->integer('userID');
            $table->string('firstName', 255);
            $table->string('lastName', 255);
            $table->text('address')->nullable();
            $table->varchar('evidence', 255)->nullable();
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
        Schema::table('tbl_user_detail', function (Blueprint $table) {
            //
        });
    }
}

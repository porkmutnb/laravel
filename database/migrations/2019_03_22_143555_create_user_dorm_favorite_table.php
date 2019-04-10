<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDormFavoriteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user_dorm_favorite', function (Blueprint $table) {
            $table->bigIncrements('favoriteID');
            $table->integer('userID');
            $table->integer('dormID');
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
        Schema::table('tbl_user_dorm_favorite', function (Blueprint $table) {
            //
        });
    }
}

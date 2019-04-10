<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDormNearbyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_dorm_nearby', function (Blueprint $table) {
            $table->bigIncrements('dormNearbyID');
            $table->integer('dormID');
            $table->string('nearby', 255);
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
        Schema::table('tbl_dorm_nearby', function (Blueprint $table) {
            //
        });
    }
}

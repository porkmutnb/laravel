<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDormFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_dorm_facilities', function (Blueprint $table) {
            $table->bigIncrements('dormFacilitiesID');
            $table->integer('dormID');
            $table->string('facilitieID', 255);
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
        Schema::table('tbl_dorm_facilities', function (Blueprint $table) {
            //
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_facilities', function (Blueprint $table) {
            $table->bigIncrements('facilitieID');
            $table->string('facilitieName', 255);
            $table->string('facilitieImage', 255);
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
        Schema::table('tbl_facilities', function (Blueprint $table) {
            //
        });
    }
}

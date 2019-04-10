<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDormImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_dorm_image', function (Blueprint $table) {
            $table->bigIncrements('dormImageID');
            $table->integer('dormID');
            $table->string('imagePath', 255)->nullable();
            $table->string('master')->nullable();
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
        Schema::table('tbl_dorm_image', function (Blueprint $table) {
            //
        });
    }
}

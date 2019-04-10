<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmphurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_amphur', function (Blueprint $table) {
            $table->bigIncrements('amphurID');
            $table->integer('provinceID');
            $table->string('amphurName', 255);
            $table->integer('geoID');
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
        Schema::table('tbl_amphur', function (Blueprint $table) {
            //
        });
    }
}

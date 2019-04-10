<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDormDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_dorm_detail', function (Blueprint $table) {
            $table->bigIncrements('dormDetailID');
            $table->integer('dormID');
            $table->string('type', 255);
            $table->string('size', 255)->nullable();
            $table->integer('price_day')->nullable();
            $table->integer('price_month');
            $table->integer('pledge')->nullable();
            $table->integer('quantity');
            $table->boolean('statusEmpty');
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
        Schema::table('tbl_dorm_detail', function (Blueprint $table) {
            //
        });
    }
}

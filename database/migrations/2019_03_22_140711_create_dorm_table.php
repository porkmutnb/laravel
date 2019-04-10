<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_dorm', function (Blueprint $table) {
            $table->bigIncrements('dormID');
            $table->integer('userID');
            $table->string('dormName', 255);
            $table->string('adminName', 255);
            $table->string('telephone1', 10)->nullable();
            $table->string('telephone2', 10)->nullable();
            $table->string('telephone3', 10)->nullable();
            $table->text('detail')->nullable();
            $table->text('address')->nullable();
            $table->string('website', 255)->nullable();
            $table->float('latitude');
            $table->float('lontitude');
            $table->string('spending', 255)->nullable();
            $table->integer('status')->default(1);
            $table->integer('approve')->default(0);
            $table->string('evidence', 255)->nullable();
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
        Schema::table('tbl_dorm', function (Blueprint $table) {
            //
        });
    }
}

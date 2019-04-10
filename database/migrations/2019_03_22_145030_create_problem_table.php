<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_problem', function (Blueprint $table) {
            $table->bigIncrements('problemID');
            $table->integer('userID');
            $table->string('topic', 255);
            $table->text('problem');
            $table->text('answer');
            $table->boolean('status')->default(false);
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
        Schema::table('tbl_problem', function (Blueprint $table) {
            //
        });
    }
}

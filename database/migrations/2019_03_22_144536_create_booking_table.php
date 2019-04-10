<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_booking', function (Blueprint $table) {
            $table->bigIncrements('bookingID');
            $table->integer('userID');
            $table->integer('dormID');
            $table->string('evidence', 255);
            $table->boolean('verify')->default(false);
            $table->boolean('status')->default(false);
            $table->timestamp('payment_date')->nullable();
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
        Schema::table('tbl_booking', function (Blueprint $table) {
            //
        });
    }
}

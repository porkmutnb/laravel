<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBankAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user_bank_account', function (Blueprint $table) {
            $table->bigIncrements('bankAccountID');
            $table->integer('userID');
            $table->integer('bankID');
            $table->string('bookbank', 255);
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
        Schema::table('tbl_user_bank_account', function (Blueprint $table) {
            //
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_bank_account', function (Blueprint $table) {
            $table->bigIncrements('bankAccountID');
            $table->string('bankAccountName', 255);
            $table->string('bankAccountImage', 255);
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
        Schema::table('tbl_bank_account', function (Blueprint $table) {
            //
        });
    }
}

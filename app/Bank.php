<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    public $table = "tbl_bank_account";

    public $primaryKey = "bankAccountID";

    protected $fillable = [
        'bankAccountName', 
        'bankAccountImage' 
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    public $table = "tbl_user_detail";

    public $primaryKey = "userDetailID";

    protected $fillable = [
        'userID', 
        'firstName', 
        'lastName', 
        'address',
        'evidence'   
    ];
}

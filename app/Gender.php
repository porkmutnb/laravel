<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    public $table = "tbl_gender";

    public $primaryKey = "genderID";

    protected $fillable = [
        'genderName'
    ];
}

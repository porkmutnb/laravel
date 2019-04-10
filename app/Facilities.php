<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facilities extends Model
{
    public $table = "tbl_facilities";

    public $primaryKey = "facilitieID";

    protected $fillable = [
        'facilitieName', 
        'facilitieImage' 
    ];
}

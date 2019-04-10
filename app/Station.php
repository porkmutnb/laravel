<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    public $table = "tbl_station";

    public $primaryKey = "stationID";

    protected $fillable = [
        'stationHead',
        'stationName'
    ];
}

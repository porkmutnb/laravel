<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amphur extends Model
{
    public $table = "tbl_amphur";

    public $primaryKey = "amphurID";

    protected $fillable = [
        'provinceID',
        'amphurName',
        'geoID'
    ];
}

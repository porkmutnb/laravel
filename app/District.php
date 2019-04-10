<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $table = "tbl_district";

    public $primaryKey = "districtID";

    protected $fillable = [
        'amphurID',
        'provinceID',
        'districtName',
        'geoID'
    ];
}

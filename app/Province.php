<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public $table = "tbl_province";

    public $primaryKey = "provinceID";

    protected $fillable = [
        'provinceName',
        'schoolName',
        'geoID'
    ];
}

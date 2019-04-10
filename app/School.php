<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public $table = "tbl_school";

    public $primaryKey = "schoolID";

    protected $fillable = [
        'schoolHead',
        'schoolName'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    public $timestamps = false;
    protected $table = 'tbl_master_type';
    protected $guarded = [''];
}

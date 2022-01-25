<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    //
      public $timestamps = false;
    protected $table = 'tbl_master_merk';
    protected $guarded = [''];
}

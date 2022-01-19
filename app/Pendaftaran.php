<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    //
    public $timestamps = false;
    protected $table = 'tbl_master_pendaftaran';
    protected $guarded = [''];


    public function pendaftarans()
    {
        return $this->hasMany(Trx_pendaftaran::class, 'pendaftaran_id', 'id');
    }

      public function jenis()
    {
        return $this->hasMany(Jenis::class, 'id', 'jenis_id');
    }



}

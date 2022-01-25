<?php

namespace App;


use App\Merk;
use App\Type;
use App\Jenis;
use App\Biodata;
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

    public function merk()
    {
        return $this->hasMany(Merk::class, 'id', 'merk_id');
    }

    public function type()
    {
        return $this->hasMany(Type::class, 'id', 'type_id');
    }

     public function biodata()
    {
        return $this->hasMany(Biodata::class, 'id', 'biodata_id');
    }


}

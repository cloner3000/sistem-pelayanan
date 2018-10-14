<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ktp extends Model
{
    protected $fillable = [
    	'provinsi','kabupaten','kecamatan','desa','nama','permohonan','no_kk','nik','alamat'
    ];

    protected $table = 'ktps';

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}

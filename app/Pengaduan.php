<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $fillable = [
    	'user_id','status','nama','nik','tanggal_lahir','pekerjaan','alamat','sasaran','isi','alternatif'
    ];

    protected $table = 'pengaduans';

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}

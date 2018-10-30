<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $fillable = [
    	'user_id','nama','nik','tanggal_lahit','pekerjaan','alamat','sasaran','isi','alternatif'
    ];

    protected $tabls = 'pengaduans';
}

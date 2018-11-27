<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sktm extends Model
{
    protected $fillable = [
    	'user_id','status','nama','jenis_kelamin','nik','tempat','tanggal','kewarganegaraan',
    	'agama','pekerjaan','alamat'
    ];

    protected $table = 'sktms';
}

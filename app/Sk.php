<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sk extends Model
{
    protected $fillable = [
    	'status','nama','jenis_kelamin','nik','tempat','tanggal','kewarganegaraan',
    	'agama','pekerjaan','alamat','keperluan','keterangan'
    ];

    protected $table='sks';
}

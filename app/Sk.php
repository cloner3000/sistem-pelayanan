<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sk extends Model
{
    protected $fillable = [
    	'status','nama','jenis_kelamin','nik','tempat','tanggal','kewarganegaraan',
    	'agama','pekerjaan','alamat','keperluan','keterangan','user_id'
    ];

    protected $table='sks';

    public function user(){
        return $this->belongsTo('App\User');
    }
}

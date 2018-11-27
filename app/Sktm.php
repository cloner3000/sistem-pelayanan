<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sktm extends Model
{
    protected $fillable = [
    	'user_id','status','nama','jenis_kelamin','nik','tempat','tanggal','kewarganegaraan',
    	'agama','pekerjaan','alamat','keperluan','n_ayah','n_ibu'
    ];

    protected $table = 'sktms';

    public function user(){
    	return $this->belongsTo('App\User');
    }
}

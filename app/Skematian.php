<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skematian extends Model
{
    protected $fillable= [
    	'nama','nik','jenis_kelamin','tanggal_lahir','agama','alamat',
    	'user_id','status','waktu','tempat','penyebab',
    	'p_nama','p_nik','p_tempat','p_tanggal','p_pekerjaan','p_alamat','p_hubungan'
    ];

    protected $table= 'skematians';

    public function user(){
        return $this->belongsTo('App\User');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sptjm extends Model
{
    protected $fillable = [
    	'user_id','status','no_kk',
    	'nama','nik','tempat','tanggal','pekerjaan','alamat',
    	'nama1','nik1','tempat1','tanggal1','pekerjaan1','alamat1',
    	'nama2','nik2','tempat2','tanggal2','pekerjaan2','alamat2',
    	's1_nama','s1_nik',
    	's2_nama','s2_nik',
        'hubungan',
    ];

    protected $table = 'sptjms';

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}

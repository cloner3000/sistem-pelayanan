<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    protected $fillable = [
    	'user_id','nik','nama','no_kk','kepala_keluarga',
    	'alamat_sekarang','alamat_tujuan','jumlah_pindah','status'
    ];
    
    protected $table = 'spps';

    public function user(){
        return $this->belongsTo('App\User');
    }
}

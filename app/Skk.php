<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skk extends Model
{
    protected $fillable = [
    	'user_id','kabupaten','kecamatan','desa','nama_kepala_keluarga','no_kk','status',
    	'b_nama','b_jenis_kelamin','b_tempat','b_tanggal','b_jenis_kelahiran','b_kelahiran_ke','b_berat','b_panjang',
    	'i_nik','i_nama','i_tanggal_lahir','i_pekerjaan','i_alamat','i_kewarganegaraan','i_kebangsaan','i_tanggal_perkawinan',
    	'a_nik','a_nama','a_tanggal_lahir','a_pekerjaan','a_alamat','a_kewarganegaraan','a_kebangsaan','a_tanggal_perkawinan',
    	'p_nik','p_nama','p_umur','p_jenis_kelamin','p_pekerjaan','p_alamat',
    	's1_nik','s1_nama','s1_umur','s1_pekerjaan','s1_alamat',
    	's2_nik','s2_nama','s2_umur','s2_pekerjaan','s2_alamat'
    ];

    protected $table = 'skks';

    public function user(){
        return $this->belongsTo('App\User');
    }
}

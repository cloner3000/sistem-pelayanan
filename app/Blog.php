<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
    	'kategori_id','slug','judul','isi','deskripsi','foto','status'
    ];

    protected $table = 'blogs';

    public function kategoris(){
    	return $this->belongsTo('App\Kategori');
    }

    public function users(){
    	return $this->belongsTo('App\User');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Web extends Model
{
    protected $fillable = [
    	'nama_website','judul_slider','deskripsi_slider','foto_slider','judul_slider1','deskripsi_slider1',
    	'foto_slider1','tentang','foto_tentang','tentang1','visi','misi','tlp','email','fb','twitter','ig',
    	'runtext','peta'
    ];

    protected $table = 'webs';
}

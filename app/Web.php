<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Web extends Model
{
    protected $fillable = [
    	'nama_website','judul_slider','deskripsi_slider','foto_slider','judul_slider1','deskripsi_slider1','foto_slider1',
    	'judul_slider2','deskripsi_slider2','foto_slider3','sejarah','visi_misi','tlp','email','fb','twitter'
    ];

    protected $table = 'webs';
}

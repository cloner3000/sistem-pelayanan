<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Struktur extends Model
{
    protected $fillable = ['nama','jabatan','foto','fb','twitter'];
    protected $table = 'strukturs';
}

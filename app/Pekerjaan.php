<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $fillable = ['nama','slug'];
    protected $table = 'pekerjaans';
}

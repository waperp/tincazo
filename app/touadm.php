<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class touadm extends Model
{
    public $timestamps    = false;
    protected $primaryKey = 'touinfscode';
    protected $table      = 'touadm';
    protected $fillable   = [
        'touadmbench',
        'touadmbenpt',
    ];
}

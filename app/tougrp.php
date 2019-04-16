<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tougrp extends Model
{
        public $timestamps  = false;
    protected $primaryKey = 'tougrpicode';
	protected $table = 'tougrp';
	protected $fillable = [
        'tougrptname', 
        'tougrpdcrea', 
        'touinfscode', 
        'plainficode',
        'tougrpvimgg',
        'tougrpbenbl',
        'tougrpsmaxp',
        'tougrpsmedp',
        'tougrpsminp',
        'tougrpsxval',
        'tougrpbchva'

    ];

    
    public function getDateFormat()
    {
        return "d-m-Y H:i:s";
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class secpin extends Model
{
        public $timestamps  = false;
    protected $primaryKey = 'secpinicode';
	protected $table = 'secpin';
	protected $fillable = [
        'secpininump', 
        'secusricode', 
        'secusrtmail', 
    ];

    
    public function getDateFormat()
    {
        return "d-m-Y H:i:s";
    }
}

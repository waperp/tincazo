<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class secutr extends Model
{
      public $timestamps  = false;
    protected $primaryKey = 'secutricode';
	protected $table = 'secutr';
	protected $fillable = [
        'secutrdtrck', 
        'secutrhtrck', 
        'secsacscode', 
        'secutritran', 
        'confrmicode',
        'secuseicode'
    ];

    
    public function getDateFormat()
    {
        return "d-m-Y H:i:s";
    }
}

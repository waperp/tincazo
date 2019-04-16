<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class plapre extends Model
{
   public $timestamps  = false;
    protected $primaryKey = 'plapreicode';
	protected $table = 'plapre';
	protected $fillable = [
        'plapredcrea', 
        'plaprethour', 
        'tougplicode', 
        'toufixicode', 
        'plapresscr1',
        'plapresscr2',
        'plapresxval','plapresptos','plaprebenbl'
    ];

    
    public function getDateFormat()
    {
        return "d-m-Y H:i:s";
    }
}

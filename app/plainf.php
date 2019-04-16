<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class plainf extends Model
{
   public $timestamps  = false;
    protected $primaryKey = 'plainficode';
	protected $table = 'plainf';
	protected $fillable = [ 
        'plainftname', 
        'plainftnick', 
        'plainftgder', 
        'plainfddobp', 
        'plainfvimgp',
        'conmemscode'
    ];

    
    public function getDateFormat()
    {
        return "d/m/Y H:i:s";
    }



}

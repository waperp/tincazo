<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tougpl extends Model
{
	 public $timestamps  = false;
    protected $primaryKey = 'tougplicode';
	protected $table = 'tougpl';
	protected $fillable = [
        'tougplicode', 
        'tougrpicode', 
        'plainficode', 
        'tougplipwin',
        'tougplsmaxp',
        'tougplsmedp',
        'tougplslowp',
        'constascode'
    ];
    public function getDateFormat()
    {
        return "d-m-Y H:i:s";
    }
}

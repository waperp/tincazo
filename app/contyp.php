<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contyp extends Model
{
    public $timestamps  = false;
    protected $primaryKey = 'contypscode';
	protected $table = 'contyp';
	protected $fillable = [ 
        'confrmicode', 
        'contyptdesc', 
    ];
    public function getDateFormat()
    {
        return "d/m/Y H:i:s";
    }
    public function scopeMatchesType($query)
    {
        return $query->where('confrmicode', 2)->get();
    }
}

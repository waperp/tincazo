<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class secusr extends Model
{
     public $timestamps  = false;
    protected $primaryKey = 'secusricode';
	protected $table = 'secusr';
	protected $fillable = [
        'secusrtmail', 
        'secusrtface', 
        'secusrtpass', 
        'secusrdregu', 
        'secusrdvalu', 
        'contypscode', 
        'secusrbenbl',
        'plainficode'
    ];

    
    public function getDateFormat()
    {
        return "d/m/Y H:i:s";
    }
}

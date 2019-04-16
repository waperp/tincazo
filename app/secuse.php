<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class secuse extends Model
{
    public $timestamps  = false;
    protected $primaryKey = 'secuseicode';
	protected $table = 'secuse';
	protected $fillable = [
        'secusedlogi', 
        'secusehlogi', 
        'secusedlogo', 
        'secusehlogo', 
        'secusetippc'
    ];

    
    public function getDateFormat()
    {
        return "d-m-Y H:i:s";
    }
}

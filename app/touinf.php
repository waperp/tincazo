<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class touinf extends Model
{
    public $timestamps  = false;
    protected $primaryKey = 'touinfscode';
	protected $table = 'touinf';
	protected $fillable = [
        'touinftname', 
        'touinfdcrea', 
        'touinfthour', 
        'touinfsnumt',
        'touinfdstat',
        'touinfdendt',
        'touinfvlogt',
        'touinfbenbl'

    ];

    
    public function getDateFormat()
    {
        return "d-m-Y H:i:s";
    }
}

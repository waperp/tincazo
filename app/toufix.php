<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class toufix extends Model
{
     public $timestamps  = false;
    protected $primaryKey = 'toufixicode';
	protected $table = 'toufix';
	protected $fillable = [
        'toufixdplay', 
        'toufixthour', 
        'constascode', 
        'touttescod1',
        'touttescod2',
        'toufixsscr1',
        'toufixsscr2',
        'toufixbpnlt',
        'toufixspen1',
        'toufixspen2',
        'toufixyxval'
    ];
    public function getDateFormat()
    {
        return "d-m-Y H:i:s";
    }
}

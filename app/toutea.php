<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class toutea extends Model
{
    public $timestamps    = false;
    protected $primaryKey = 'touteascode';
    protected $table      = 'toutea';
    protected $fillable   = [
        'touteatname',
        'contypscode',
        'touteavimgt',
        'touteatabrv'

    ];

    public function getDateFormat()
    {
        return "d-m-Y H:i:s";
    }
}

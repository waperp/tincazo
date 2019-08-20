<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Session;

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

    public function scopeMyChampion($query)
    {

        return Cache::remember("MyChampion", now()->addMinutes(60), function () use ($query) {

            return $query->select(
                'contyp.contyptdesc',
                'toutea.touteatabrv',
                'toutte.touttescode as touttescode1',
                'toutea.touteavimgt',
                'toutea.touteatname',
                'plachm.touttescode'
            )
                ->join('toutte', 'toutea.touteascode', 'toutte.touteascode')
                ->join('tougrp', 'toutte.touinfscode', 'tougrp.touinfscode')
                ->join('tougpl', 'tougrp.tougrpicode', 'tougpl.tougrpicode')
                ->join('contyp', function ($contyp) {
                    $contyp->on('toutea.contypscode', 'contyp.contypscode')
                        ->where('contyp.confrmicode', 2);
                })
                ->join('plachm', function ($plachm) {
                    $plachm->on('toutte.touttescode', 'plachm.touttescode')
                        ->where('plachm.tougplicode', Session::get('select-tougplicode'));
                })
                ->where('tougrp.tougrpicode', Session::get('select-tougrpicode'))
                ->where('tougpl.tougplicode',  Session::get('select-tougplicode'))
                ->first();
        });
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class tougrp extends Model
{
    public $timestamps  = false;
    protected $primaryKey = 'tougrpicode';
    protected $table = 'tougrp';
    protected $fillable = [
        'tougrptname',
        'tougrpdcrea',
        'touinfscode',
        'plainficode',
        'tougrpvimgg',
        'tougrpbenbl',
        'tougrpsmaxp',
        'tougrpsmedp',
        'tougrpsminp',
        'tougrpsxval',
        'tougrpbchva',
        'tougrpschpt',

    ];
    public function scopeInvitationsTotal($query)
    {
        return Cache::remember("InvitationsTotal", now()->addMinutes(60), function () use ($query) {
            return $query
                ->join('tougpl', 'tougrp.tougrpicode', 'tougpl.tougrpicode')
                ->join('touinf', 'tougrp.touinfscode', 'touinf.touinfscode')
                ->where('tougpl.plainficode', \Auth::user()->plainficode)
                ->where('tougpl.constascode', 1)
                ->count();
        });
    }
}

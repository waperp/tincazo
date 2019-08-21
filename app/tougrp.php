<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Session;

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
    public function scopeTournamentsWithGroups($query)
    {
        // 'select tougrp.*,touinf.*, tougpl.tougplicode
        // from tougrp
        // join touinf on tougrp.touinfscode = touinf.touinfscode
        // join tougpl on tougrp.tougrpicode = tougpl.tougrpicode
        // where tougrp.tougrpbenbl = 1 
        // and tougpl.plainficode = ? 
        // and tougpl.constascode = 2 and touinf.touinfscode = ?';
        $touinfscode = null;
        if (Session::has('session_link_tournament')) {
            $touinfscode = Session::get('session_link_tournament')->touinfscode;
        }
        return $query
            ->select('tougrp.*', 'touinf.*', 'tougpl.tougplicode', \DB::raw('(Select count(tougpl.tougplicode) from tougpl where tougpl.tougrpicode = tougrp.tougrpicode) as total'))
            ->join('touinf', 'tougrp.touinfscode', 'touinf.touinfscode')
            ->join('tougpl', 'tougrp.tougrpicode', 'tougpl.tougrpicode')
            ->where('tougrp.tougrpbenbl', 1)
            ->where('tougpl.plainficode', \Auth::user()->plainficode)
            ->where('tougpl.constascode', 2)
            ->where('touinf.touinfscode', $touinfscode)
            ->get();
    }
}

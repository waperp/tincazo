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
        return $query
            ->join('tougpl', 'tougrp.tougrpicode', 'tougpl.tougrpicode')
            ->join('touinf', 'tougrp.touinfscode', 'touinf.touinfscode')
            ->where('tougpl.plainficode', \Auth::user()->plainficode)
            ->where('tougpl.constascode', 1)
            ->count();
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
            ->select('tougrp.secconnuuid as secconnuuid1', 'tougrp.*', 'touinf.*', 'tougpl.tougplicode', \DB::raw('(Select count(tougpl.tougplicode) from tougpl where tougpl.tougrpicode = tougrp.tougrpicode) as total'))
            ->join('touinf', 'tougrp.touinfscode', 'touinf.touinfscode')
            ->join('tougpl', 'tougrp.tougrpicode', 'tougpl.tougrpicode')
            ->where('tougrp.tougrpbenbl', 1)
            ->where('tougpl.plainficode', \Auth::user()->plainficode)
            ->where('tougpl.constascode', 2)
            ->where('touinf.touinfscode', $touinfscode)
            ->get();
    }
    public function scopeGroups($query, $touinfscode)
    {
        // 'select tougrp.*,touinf.*, tougpl.tougplicode
        // from tougrp
        // join touinf on tougrp.touinfscode = touinf.touinfscode
        // join tougpl on tougrp.tougrpicode = tougpl.tougrpicode
        // where tougrp.tougrpbenbl = 1 
        // and tougpl.plainficode = ? 
        // and tougpl.constascode = 2 and touinf.touinfscode = ?';
        return $query
            ->select('tougrp.secconnuuid as secconnuuid1', 'tougrp.*', 'touinf.*', 'tougpl.tougplicode', \DB::raw('(Select count(tougpl.tougplicode) from tougpl where tougpl.tougrpicode = tougrp.tougrpicode) as total'))
            ->join('touinf', 'tougrp.touinfscode', 'touinf.touinfscode')
            ->join('tougpl', 'tougrp.tougrpicode', 'tougpl.tougrpicode')
            ->where('tougrp.tougrpbenbl', 1)
            ->where('tougpl.plainficode', \Auth::user()->plainficode)
            ->where('tougpl.constascode', 2)
            ->where('touinf.touinfscode', $touinfscode)
            ->get();
    }
    public function scopeMisInvitaciones($query)
    {
        return $query->select('tougrp.tougrpicode', 'tougrp.tougrpvimgg', 'tougrp.tougrptname', 'touinf.touinftname')
            ->join('tougpl', 'tougrp.tougrpicode', 'tougpl.tougrpicode')
            ->join('touinf', 'tougrp.touinfscode', 'touinf.touinfscode')
            ->where('tougpl.plainficode', Session::get('plainficode'))
            ->where('tougpl.constascode', 1)
            ->get();
    }
    public function scopeIsUserGroupAdmin($query)
    {
        $isAdmin = $query->select(\DB::raw('COUNT(tougrp.tougrpicode) as isAdmin'))
            ->where('tougrp.plainficode', Session::get('plainficode'))
            ->where('tougrp.tougrpicode', Session::get('select-tougrpicode'))
            ->where('tougrp.touinfscode', Session::get('select-touinfscode'))
            ->first();
        return $isAdmin->isAdmin;
    }
}

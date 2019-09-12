<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class touinf extends Model
{
    public $timestamps  = false;
    protected $primaryKey = 'touinfscode';
    protected $table = 'touinf';
    protected $fillable = [
        'touinftname',
        'secconnuuid',
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
    public function scopeTournamentMenu($query)
    {
        return $query->select('touinf.*')
            ->join('tougrp', 'touinf.touinfscode', 'tougrp.touinfscode')
            ->join('tougpl', 'tougrp.tougrpicode', 'tougpl.tougrpicode')
            ->where('tougpl.plainficode', \Auth::user()->plainficode)
            ->distinct()
            ->orderBy('touinfdstat', 'desc')
            ->get();
    }
    public function scopeTournamentActive($query)
    {
        $query->where('touinfdendt', '>=', Carbon::now()->toDateString());
    }
    public function scopeTournamentDateValidate($query)
    {
       return $query->select(\DB::raw('count(touinf.touinfscode) as fecha'))
        ->where('touinf.touinfscode', Session::get('select-touinfscode'))
        ->where('touinf.touinfdstat', '>',  Carbon::now()->toDateString())
        ->first();
    }
    public function scopeTournamentSlider($query)
    {
       return $query->where('touinfdendt', '>', Carbon::now()->toDateString())
       ->orderBy('touinfscode', 'DESC')->get();
    }
}

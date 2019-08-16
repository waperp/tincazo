<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;
use Laravel\Passport\HasApiTokens;

class secusr extends Authenticatable
{
    use HasApiTokens;
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
    protected $hidden = ['secusrtpass', 'remember_token'];

    public function getDateFormat()
    {
        return "d/m/Y H:i:s";
    }
    public function getAuthPassword()
    {
        return $this->secusrtpass;
    }
    public function scopePlayerInfo($query)
    {
        return Cache::remember("playerInfo", now()->addMinutes(60), function () use ($query) {
            return $query->select('plainf.*')
                ->join('plainf', 'plainf.plainficode', 'secusr.plainficode')
                ->where('plainf.plainficode', $this->plainficode)->first();
        });
    }
    public function scopeMembership($query)
    {
        return Cache::remember("Membership", now()->addMinutes(60), function () use ($query) {

            return $query->select('conmem.*')
                ->join('plainf', 'plainf.plainficode', 'secusr.plainficode')
                ->join('conmem', 'conmem.conmemscode', 'plainf.conmemscode')
                ->where('plainf.plainficode', \Auth::user()->plainficode)->first();
        });
    }
    public function scopeIsAdmin($query)
    {
        return Cache::remember("isAdmin", now()->addMinutes(60), function () use ($query) {
            $data = $query->select('secusr.contypscode')
                ->where('secusr.plainficode', \Auth::user()->plainficode)
                ->first();
            return $data->contypscode;
        });
    }
}

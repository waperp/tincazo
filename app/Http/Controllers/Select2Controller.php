<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use Session;
use App\touinf;
use App\tougrp;
class Select2Controller extends Controller
{
    public function comboEquipos($touinfscode, $contypscode, Request $request)
    {

        $data = [];
        if ($request->has('q')) {
            $search = $request->q;

            $data = DB::table('toutea')->select("toutea.touteascode", "toutea.touteatname")
                ->whereNotIn('toutea.touteascode', function ($toutte) use ($touinfscode) {
                    $toutte->select('toutte.touteascode')->from('toutte')->where('toutte.touinfscode', $touinfscode);
                })->where('toutea.contypscode', $contypscode)
                ->where('toutea.touteatname', 'LIKE', "%$search%")
                ->get();
        } else {
            $data = DB::table('toutea')->select("toutea.touteascode", "toutea.touteatname")
                ->whereNotIn('toutea.touteascode', function ($toutte) use ($touinfscode) {
                    $toutte->select('toutte.touteascode')->from('toutte')->where('toutte.touinfscode', $touinfscode);
                })->where('toutea.contypscode', $contypscode)
                ->get();
        }

        //   $AjaxComboEmpresas =  DB::select('Select concom.concomicode, concom.concomtname from concom ');

        return response()->json($data);
    }
    public function select2combos($touinfscode, Request $request)
    {

        $data = [];
        if ($request->has('q')) {
            $search = $request->q;

            $data = DB::table('toutea')
                ->join('toutte', 'toutea.touteascode', 'toutte.touteascode')
                ->where('toutea.touteatname', 'LIKE', "%$search%")
                ->where('toutte.touinfscode', '=', $touinfscode)
                ->orderBy('toutea.touteatname', 'asc')
                ->get();
        } else {
            $data = DB::table('toutea')
                ->join('toutte', 'toutea.touteascode', 'toutte.touteascode')
                ->where('toutte.touinfscode', '=', $touinfscode)
                ->orderBy('toutea.touteatname', 'asc')
                ->get();
        }

        return response()->json($data);
    }
    public function selectMenbresia(Request $request)
    {

        $data = [];
        if ($request->has('q')) {
            $search = $request->q;
            $data   = DB::table('conmem')->where('conmem.conmemtname', 'LIKE', "%$search%")->where('conmem.conmemscode', 2)->get();
        } else {
            $data = DB::table('conmem')->where('conmem.conmemscode', 2)->get();
        }

        return response()->json($data);
    }
    public function selectResponsable(Request $request)
    {

        // $data = [];
        // if ($request->has('q')) {
        //     $search = $request->q;
        $data = DB::select('Select plainf.plainficode, plainf.plainfvimgp, plainf.plainftname from plainf join secusr on plainf.plainficode = secusr.plainficode
        where secusr.secusrbenbl = 1 and plainf.conmemscode > 1');

        // } else {
        // }

        return response()->json($data);
    }
    public function selected_tournament(Request $request)
    {
        $touinf = touinf::where('secconnuuid', $request->secconnuuid)->first();
        if ($touinf) {
            Session::put('session_link_tournament', $touinf);
        } else {
            Session::forget('session_link_tournament');
        }
        Session::put('touinf', $touinf);
        $groups = tougrp::tournamentsWithGroups();
        return response()->json($groups);
    }
    public function selected_group(Request $request)
    {
        $tougrp = tougrp::join('tougpl', 'tougpl.tougrpicode', 'tougrp.tougrpicode')
            ->where('tougrp.secconnuuid', $request->secconnuuid)
            ->where('tougpl.tougplicode', $request->tougplicode)
            ->first();
        Session::put('session_selected_tougrp', $tougrp);
        Session::put('tougrp', $tougrp);
        Session::put('select-tougrptname', $tougrp->tougrptname);
        Session::put('select-q', true);
        Session::put('select-tougrpicode', $tougrp->tougrpicode);
        Session::put('select-touinfscode', $tougrp->touinfscode);
        Session::put('select-tougplicode', $tougrp->tougplicode);
        Session::put('select-plainficode', $tougrp->plainficode);
        Session::put('select-tougrpsxval', $tougrp->tougrpsxval);
        Session::put('select-tougrpschpt', $tougrp->tougrpschpt);
        if (Session::get('plainficode') == Session::get('select-plainficode')) {
            Session::put('session-admin-tougrp', true);
        } else {
            Session::put('session-admin-tougrp', false);
        }
        return response()->json($tougrp);
    }
}

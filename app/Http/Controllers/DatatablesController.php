<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use Session;

class DatatablesController extends Controller
{
    public function tablaPosicionesGrupo(Request $request)
    {

        $data = DB::select(
            'select RANK() OVER (ORDER BY tougpl.tougplipwin DESC) AS POS, 
        plainf.plainficode , plainf.plainfvimgp, plainf.plainftnick JUGADOR,
        tougpl.tougplsmaxp TA, tougpl.tougplsmedp TM, tougpl.tougplslowp TB, 
        tougpl.`tougplipwin` TINCAZOS, 
        tougpl.`tougplschpt` CAMPEON,
        tougpl.tougplipwin + tougpl.`tougplschpt` PTOS
         FROM tougpl 
         JOIN plainf ON tougpl.plainficode = plainf.plainficode
        WHERE tougpl.tougrpicode = ? AND tougpl.constascode = 2 ORDER BY tougpl.tougplipwin DESC, plainf.plainftnick ASC',
            [Session::get('select-tougrpicode')]
        );
        return Datatables::of($data)->make(true);
    }
    public function tableGestionarFixture(Request $request)
    {
        $fecha = '';
        if ($request->has('toufixdplay')) {
            $fecha = Carbon::parse($request->toufixdplay)->format('Y-m-d');
        } else {
            $fecha = '';
        }
        // return $request->touinfscode;
        $data = DB::select('Select toufix.toufixicode, toutea1.touteavimgt, toutea1.touteatname, toufix.toufixsscr1, toufix.toufixspen1, toutea2.touteavimgt as
                touteavimgt2, toutea2.touteatname as touteatname2, toufix.toufixsscr2, toufix.toufixspen2, toufix.toufixbpnlt, consta.constatdesc,
                toufix.toufixdplay,toufix.toufixthour,toufix.toufixyxval ,consta.constascode, consta.constatdesc
                From toufix
                join toutte toutte1 on toufix.touttescod1 = toutte1.touttescode
                join toutte toutte2 on toufix.touttescod2 = toutte2.touttescode
                join toutea toutea1 on toutte1.touteascode = toutea1.touteascode
                join toutea toutea2 on toutte2.touteascode = toutea2.touteascode join consta
                on toufix.constascode = consta.constascode and consta.confrmicode = 3
                Where toufix.toufixdplay = ? and toutte1.touinfscode = ? and toutte2.touinfscode = ?', [$fecha, $request->touinfscode, $request->touinfscode]);
        return Datatables::of($data)->make(true);
    }
    public function tablaInvitacionesGrupo(Request $request)
    {
        $data = DB::select(
            'Select plainf.plainficode, plainf.plainfvimgp, secusr.secusrtmail,
            plainf.plainftname, plainf.plainftnick, (Select tougpl.constascode from tougpl where tougpl.tougrpicode = ? and tougpl.plainficode =
        plainf.plainficode) as constascode from plainf join secusr on plainf.plainficode = secusr.plainficode where secusr.secusrbenbl = 1 order by plainf.plainftname',
            [Session::get('select-tougrpicode')]
        );
        return Datatables::of($data)->make(true);
    }
    public function tableGestionarGruposAdmin(Request $request)
    {
        // $data = tougrp::join('plainf','plainf.plainficode', 'tougrp.plainficode')->where('tougrp.touinfscode', $request->touinfscode)->get();
        $data = DB::select('Select tougrp.tougrpicode , tougrp.tougrpvimgg, 
        tougrp.tougrptname, plainf.plainftname, tougrp.tougrpdcrea, tougrp.tougrpsmaxp, tougrp.tougrpsmedp,
        tougrp.tougrpsminp, (Select count(tougpl.tougplicode) from tougpl where tougpl.tougrpicode = tougrp.tougrpicode) as total
        from tougrp 
        join plainf on tougrp.plainficode = plainf.plainficode where tougrp.touinfscode = ?', [$request->touinfscode]);

        return Datatables::of($data)->make(true);
    }
    public function tablaPosicionesPorDia(Request $request)
    {
        $date = Carbon::now();
        $data = DB::select(
            'Select plainf.plainficode,plainf.plainfvimgp, plainf.plainftnick, sum(plapre.plapresptos) as PTOS from plapre
            join toufix on
            plapre.toufixicode = toufix.toufixicode join tougpl on plapre.tougplicode = tougpl.tougplicode join plainf on tougpl.plainficode =
            plainf.plainficode where toufix.toufixdplay = ? and tougpl.tougrpicode = ? and toufix.constascode = 3
            group by plainf.plainficode, plainf.plainfvimgp, plainf.plainftnick Order By PTOS desc, plainf.plainftnick asc',
            [Carbon::parse($request->fecha)->format('Y-m-d'), Session::get('select-tougrpicode')]
        );
        return Datatables::of($data)->make(true);
    }
    public function tablaAdminTorneosEquipos(Request $request)
    {
        $data = DB::table('toutea')
            ->join('contyp', 'contyp.contypscode', 'toutea.contypscode')
            ->join('toutte', 'toutte.touteascode', 'toutea.touteascode')
            ->join('touinf', 'toutte.touinfscode', 'touinf.touinfscode')

            ->where('contyp.confrmicode', 2)->where('touinf.touinfscode', $request->touinfscode)->orderBy('toutea.touteatname')->get();
        return Datatables::of($data)->make(true);
    }
    public function tablaInfoPlayer(Request $request)
    {
        $data = DB::select(
            'Select t1.touteavimgt as touteavimgt1, t1.touteatabrv as touteatabrv1, toufix.toufixsscr1, plapre.plapresscr1, plapre.plapresscr2, toufix.toufixsscr2, t2.touteatabrv as touteatabrv2, 
        t2.touteavimgt as touteavimgt2, plapre.plapresptos
        from toufix join plapre on toufix.toufixicode = plapre.toufixicode join tougpl on plapre.tougplicode = tougpl.tougplicode join 
        (Select touttescode, touteatabrv, touteavimgt from toutea join toutte on toutea.touteascode = toutte.touteascode) 
        t1 on toufix.touttescod1 = t1.touttescode join
        (Select touttescode, touteatabrv, touteavimgt from toutea join toutte on toutea.touteascode = toutte.touteascode) 
        t2 on toufix.touttescod2 = t2.touttescode
        where tougpl.plainficode = ? and tougpl.tougrpicode = ? and toufix.constascode in (3) 
        order by toufix.toufixicode desc',
            [$request->plainficode, Session::get('select-tougrpicode')]
        );
        return Datatables::of($data)->make(true);
    }
    public function tablaInfoPlayerDia(Request $request)
    {
        $data = DB::select(
            'Select t1.touteavimgt as touteavimgt1, t1.touteatabrv as touteatabrv1, toufix.toufixsscr1, plapre.plapresscr1, plapre.plapresscr2, toufix.toufixsscr2, t2.touteatabrv as touteatabrv2, 
            t2.touteavimgt as touteavimgt2, plapre.plapresptos
            from toufix join plapre on toufix.toufixicode = plapre.toufixicode join tougpl on plapre.tougplicode = tougpl.tougplicode join 
            (Select touttescode, touteatabrv, touteavimgt from toutea join toutte on toutea.touteascode = toutte.touteascode) 
            t1 on toufix.touttescod1 = t1.touttescode join
            (Select touttescode, touteatabrv, touteavimgt from toutea join toutte on toutea.touteascode = toutte.touteascode) 
            t2 on toufix.touttescod2 = t2.touttescode
            where tougpl.plainficode = ? and tougpl.tougrpicode = ? and toufix.constascode in (3) and toufix.toufixdplay = ? 
            order by toufix.toufixicode desc',
            [$request->plainficode, Session::get('select-tougrpicode'), Carbon::parse($request->fecha)->format('Y-m-d')]
        );
        return Datatables::of($data)->make(true);
    }
    public function tablaAdminEquipos(Request $request)
    {
        $data = DB::table('toutea')->select('toutea.*', 'contyp.*')
            ->join('contyp', 'contyp.contypscode', 'toutea.contypscode')
            ->where('contyp.confrmicode', 2)->where('contyp.contypscode', $request->contypscode)->orderBy('toutea.touteatname')->get();
        return Datatables::of($data)->make(true);
    }
    public function tablaAdminTorneos(Request $request)
    {
        $data = DB::table('touinf')->get();
        return Datatables::of($data)->make(true);
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\sendValidateMail;
use App\plainf;
use App\secpin;
use App\secusr;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Session;
use Validator;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{
    public function ss()
    {
        // $listaToutea = DB::select('select * from toutea');
        // dd($listaToutea);
    }
    public function inicio()
    {
        $listaTouinf = DB::table('touinf')->get();

        return view('indexOfline', compact('listaTouinf'));
    }

    public function sessionLink(Request $request)
    {
        // return response()->json($request->all());
        Session::forget('select-q');

        Session::forget('select-tougrptname');
        Session::forget('select-tougrpicode');
        Session::forget('select-touinfscode');
        Session::forget('select-tougplicode');
        Session::forget('select-plainficode');
        Session::forget('session-admin-tougrp');
        Session::forget('select-tougrpsxval');

        Session::put('select-tougrptname', $request->tougrptname);
        Session::put('select-q', true);
        Session::put('select-tougrpicode', $request->tougrpicode);
        Session::put('select-touinfscode', $request->touinfscode);
        Session::put('select-tougplicode', $request->tougplicode);
        Session::put('select-plainficode', $request->plainficode);
        Session::put('select-tougrpsxval', $request->tougrpsxval);
        if(Session::get('plainficode') == Session::get('select-plainficode')){
            Session::put('session-admin-tougrp', true);
        }else{
            Session::put('session-admin-tougrp', false);
        }
        return response()->json(1);

    }

    public function validateMail(Request $request)
    {
        if ($request->has('secusrtmail') || $request->secusrtmail != null) {
            $existMail = DB::table('secusr')->where('secusrtmail', $request->secusrtmail)->first();
            if ($existMail) {

                return response()->json(['secusr' => $existMail, 'mail' => true]);
            }
            return response()->json(['secusr' => $existMail, 'mail' => false]);
        } else {

            return response()->json(['mail' => null]);
        }

    }

    public function updateResetPassword(Request $request)
    {
        if ($request->has('utm_ref') && $request->has('utm_source') && $request->has('utm_value')) {
            try {
                $secusrtmail = $request->utm_ref;
                $secusricode = Crypt::decrypt($request->utm_source);
                $secpininump = Crypt::decrypt($request->utm_value);
                $existMail   = secpin::where('secusrtmail', $request->utm_ref)
                    ->where('secpin.secpininump', $secpininump)
                    ->where('secpin.secusricode', $secusricode)->first();
                if ($existMail) {
                    $secusr              = secusr::where('secusrtmail', $secusrtmail)->first();
                    $secusr->secusrtpass = Hash::make($request->confirmPassword);
                    $secusr->save();
                    $plainf = plainf::find($secusr->plainficode);
                    Session::put('secusrtmail', $secusr->secusrtmail);
                    Session::put('secusricode', $secusr->secusricode);
                    Session::put('plainficode', $secusr->plainficode);
                    Session::put('contypscode', $secusr->contypscode);
                    Session::put('plainftnick', $plainf->plainftnick);
                    Session::put('conmemscode', $plainf->conmemscode);
                    return redirect('/');
                } else {
                    return back()
                        ->withErrors(['error' => 'Estas credenciales no coinciden con nuestros registros'])
                        ->withInput(request(['error']));
                }
            } catch (DecryptException $e) {
                return back()
                    ->withErrors(['error' => 'Estas credenciales no coinciden con nuestros registros'])
                    ->withInput(request(['error']));
            }

        } else {
            return back()
                ->withErrors(['error' => 'Estas credenciales no coinciden con nuestros registros'])
                ->withInput(request(['error']));
        }

    }
   
    public function resetPassword(Request $request)
    {
        $secusrtmail = $request->utm_ref;
        $secusricode = $request->utm_source;
        $secpininump = $request->utm_value;

        // if($request->has('utm_ref')){
        return view('emails.resetPassword', compact('secusrtmail', 'secusricode', 'secpininump'));
        // }else{
        //         return redirect('/');
        // }
        // $secusricode = Session::get('reset-secusricode');
        // $secusrtmail = Session::get('reset-secusrtmail');
        // return response()->json($secusrtmail." - ".$secusricode);

    }
    public function sendValidateMail(Request $request)
    {

        // return $request->all();

        $secpin              = new secpin;
        $secpin->secpininump = mt_rand(10000, 99999);
        $secpin->secusricode = $request->secusricode;
        $secpin->secusrtmail = $request->secusrtmail;
        $secpin->save();

        // $secpinEncrypt  = new secpin;
        // $secpinEncrypt->secpininump = Crypt::encryptString($secpin->secpininump);
        // $secpinEncrypt->secusricode =  Crypt::encryptString($secpin->secusricode);
        // $secpinEncrypt->secusrtmail =  $secpin->secusrtmail;
        // return (new \App\Mail\sendValidateMail($secpin))->render();

        Mail::to($request->secusrtmail)->send(new sendValidateMail($secpin));
        return response()->json($secpin);

    }
    public function index(Request $request)
    {
        $listaTorneos = [] ;
        $date = Carbon::now();
        // return  dd$request->ajax();
        if (!$request->has('q')) {
            Session::forget('select-q');

        }
        // return $request->all();
        // Session::put('touinfscode',$request->touinfscode);
        $listaConmen     = DB::table('conmem')->get();
        $listaTouinf = DB::table('touinf')->where('touinfdendt','>',Carbon::now()->toDateString())->get();
        $listaTouinfSlider = DB::table('touinf')->where('touinfdendt','>',Carbon::now()->toDateString())->get();
        $listaTipoPlantel = DB::table('contyp')->where('confrmicode',2)->get();
        $listaTorneosMenu = DB::select('select DISTINCT touinf.* FROM touinf 
        JOIN tougrp ON touinf.touinfscode = tougrp.touinfscode 
        JOIN tougpl ON tougrp.tougrpicode = tougpl.tougrpicode
WHERE tougpl.plainficode = ?',[Session::get('plainficode')]);
        $listaToutea     = DB::table('toutea')->get();
        $validarTougrpbchva = DB::table('tougrp')->where('tougrpicode',Session::get('select-tougrpicode'))->first();
        $listaEditPerfil = DB::table('secusr')
            ->join('plainf', 'secusr.plainficode', 'plainf.plainficode')
            ->where('plainf.plainficode', Session::get('plainficode'))
            ->first();
        $listaContypEquipos = DB::table('contyp')->whereConfrmicode(2)->get();
        if(Session::has('session_link_tournament')){
            $touinf_link_tournament = Session::get('session_link_tournament');
        $listaTorneos       = DB::select('select tougrp.*,touinf.*, tougpl.tougplicode
        from tougrp
        join touinf on tougrp.touinfscode = touinf.touinfscode
        join tougpl on tougrp.tougrpicode = tougpl.tougrpicode
        where tougrp.tougrpbenbl = 1 and tougpl.plainficode = ? and tougpl.constascode = 2 and touinf.touinfscode = ?', [Session::get('plainficode'),$touinf_link_tournament->touinfscode]);
        }

        $fechaValidar = DB::table('touinf')->select(DB::raw('count(touinf.touinfscode) as fecha'))
            ->where('touinf.touinfscode', Session::get('select-touinfscode'))
            ->where('touinf.touinfdstat', '>', $date->toDateString())
            ->first();
        /*dd($fechaValidar);*/

        $listaEquiposElegir = DB::select('select toutte.touttescode as touttescode1, toutea.touteavimgt, toutea.touteatname, plachm.touttescode
        from toutea
        join toutte on toutea.touteascode = toutte.touteascode
        join tougrp on toutte.touinfscode = tougrp.touinfscode
        join tougpl on tougrp.tougrpicode = tougpl.tougrpicode
        left join plachm on toutte.touttescode = plachm.touttescode and plachm.tougplicode = ?
        where tougrp.tougrpicode = ? and tougpl.tougplicode = ? order by touteatname asc',
            [Session::get('select-plainficode'), Session::get('select-tougrpicode'), Session::get('select-tougplicode')]);

        $miCampeon = DB::select('select toutte.touttescode as touttescode1, toutea.touteavimgt, toutea.touteatname, plachm.touttescode
        from toutea
        join toutte on toutea.touteascode = toutte.touteascode
        join tougrp on toutte.touinfscode = tougrp.touinfscode
        join tougpl on tougrp.tougrpicode = tougpl.tougrpicode
        join plachm on toutte.touttescode = plachm.touttescode and plachm.tougplicode = ?
             where tougrp.tougrpicode = ? and tougpl.tougplicode = ? order by touteatname asc limit 1',
            [Session::get('select-tougplicode'), Session::get('select-tougrpicode'), Session::get('select-tougplicode')]);
        $estadisticas = DB::select('Select toutea.touteavimgt, toutea.touteatname, count(tougpl.tougplicode) as cantidad from toutea join toutte on toutea.touteascode = toutte.touteascode
        join plachm on toutte.touttescode = plachm.touttescode join tougpl on plachm.tougplicode = tougpl.tougplicode where tougpl.tougrpicode = ?
        group by  toutea.touteavimgt, toutea.touteatname', [Session::get('select-tougrpicode')]);

        $listaInvitaciones = DB::select('Select tougrp.tougrpicode, tougrp.tougrpvimgg, tougrp.tougrptname, touinf.touinftname
        from tougrp join tougpl on tougrp.tougrpicode = tougpl.tougrpicode join touinf on tougrp.touinfscode = touinf.touinfscode
        where tougpl.plainficode = ? and tougpl.constascode = 1', [Session::get('plainficode')]);

        return view('index', compact('listaConmen', 'listaTouinf','listaTipoPlantel', 'listaTorneos', 'listaInvitaciones',
            'listaContypEquipos', 'listaToutea', 'listaEquiposElegir', 'miCampeon', 'estadisticas',
            'listaEditPerfil', 'fechaValidar','listaTouinfSlider','validarTougrpbchva','listaTorneosMenu'));

    }

    public function tablaPosicionesGrupo(Request $request)
    {

//         $validator = Validator::make($request->all(), [
//             'tougrpicode' => 'required',
//         ]);
//         if ($validator->passes()) {

//         }else{
// return $validator->errors()->all();
//         }

        // if ($request->ajax()) {
            
        // } else {
        //      return response(view('403'), 403);
        // }
        $data = DB::select('Select RANK() OVER (Order By tougpl.tougplipwin desc) as POS, plainf.plainficode , plainf.plainfvimgp, plainf.plainftnick JUGADOR,
tougpl.tougplsmaxp TA, tougpl.tougplsmedp TM, tougpl.tougplslowp TB, tougpl.tougplipwin PTOS from tougpl join plainf on tougpl.plainficode =
plainf.plainficode where tougpl.tougrpicode = ? and tougpl.constascode = 2 order by tougpl.tougplipwin desc, plainf.plainftnick asc', 
[Session::get('select-tougrpicode')]);
            return Datatables::of($data)->make(true);

    }

    public function tablaPosicionesPorDia(Request $request)
    {
        $date = Carbon::now();
        $data = DB::select('Select plainf.plainficode,plainf.plainfvimgp, plainf.plainftnick, sum(plapre.plapresptos) as PTOS from plapre
            join toufix on
            plapre.toufixicode = toufix.toufixicode join tougpl on plapre.tougplicode = tougpl.tougplicode join plainf on tougpl.plainficode =
            plainf.plainficode where toufix.toufixdplay = ? and tougpl.tougrpicode = ? and toufix.constascode = 3
            group by plainf.plainficode, plainf.plainfvimgp, plainf.plainftnick Order By PTOS desc, plainf.plainftnick asc',
            [Carbon::parse($request->fecha)->format('Y-m-d'), Session::get('select-tougrpicode')]);
        return Datatables::of($data)->make(true);
    }
    public function tablaInfoPlayer(Request $request)
    {
        $data = DB::select('Select t1.touteavimgt as touteavimgt1, t1.touteatabrv as touteatabrv1, toufix.toufixsscr1, plapre.plapresscr1, plapre.plapresscr2, toufix.toufixsscr2, t2.touteatabrv as touteatabrv2, 
t2.touteavimgt as touteavimgt2, plapre.plapresptos
from toufix join plapre on toufix.toufixicode = plapre.toufixicode join tougpl on plapre.tougplicode = tougpl.tougplicode join 
(Select touttescode, touteatabrv, touteavimgt from toutea join toutte on toutea.touteascode = toutte.touteascode) 
t1 on toufix.touttescod1 = t1.touttescode join
(Select touttescode, touteatabrv, touteavimgt from toutea join toutte on toutea.touteascode = toutte.touteascode) 
t2 on toufix.touttescod2 = t2.touttescode
where tougpl.plainficode = ? and tougpl.tougrpicode = ? and toufix.constascode in (3) 
order by toufix.toufixicode desc',
            [$request->plainficode, Session::get('select-tougrpicode')]);
        return Datatables::of($data)->make(true);
    }
public function politica (){
    return view('partials.politica');

}public function guia (){
    return view('partials.guia');

}
    public function tablaInfoPlayerDia(Request $request)
    {
        $data = DB::select('Select t1.touteavimgt as touteavimgt1, t1.touteatabrv as touteatabrv1, toufix.toufixsscr1, plapre.plapresscr1, plapre.plapresscr2, toufix.toufixsscr2, t2.touteatabrv as touteatabrv2, 
t2.touteavimgt as touteavimgt2, plapre.plapresptos
from toufix join plapre on toufix.toufixicode = plapre.toufixicode join tougpl on plapre.tougplicode = tougpl.tougplicode join 
(Select touttescode, touteatabrv, touteavimgt from toutea join toutte on toutea.touteascode = toutte.touteascode) 
t1 on toufix.touttescod1 = t1.touttescode join
(Select touttescode, touteatabrv, touteavimgt from toutea join toutte on toutea.touteascode = toutte.touteascode) 
t2 on toufix.touttescod2 = t2.touttescode
            where tougpl.plainficode = ? and tougpl.tougrpicode = ? and toufix.constascode in (3) and toufix.toufixdplay = ? 
            order by toufix.toufixicode desc',
            [$request->plainficode, Session::get('select-tougrpicode'),Carbon::parse($request->fecha)->format('Y-m-d')]);
        return Datatables::of($data)->make(true);
    }
    public function tablaInvitacionesGrupo(Request $request)
    {
        $data = DB::select('Select plainf.plainficode, plainf.plainfvimgp, 
            plainf.plainftname, plainf.plainftnick, (Select tougpl.constascode from tougpl where tougpl.tougrpicode = ? and tougpl.plainficode =
        plainf.plainficode) as constascode from plainf join secusr on plainf.plainficode = secusr.plainficode where secusr.secusrbenbl = 1 order by plainf.plainftname', 
        [Session::get('select-tougrpicode')]);
        return Datatables::of($data)->make(true);

    }
    public function validarCampeonFechas(Request $request)
    {
        $data = DB::table('toufix')->select(DB::raw('count(toufix.toufixicode) as fecha'))
            ->join('toutte', 'toufix.touttescod1', 'toutte.touttescode')
            ->where('toutte.touinfscode', $request->touinfscode)
            ->where('toufix.constascode', '>', 1)
            ->first();

//             Select count(toufix.toufixicode) from toufix
        //             join toutte on toufix.touttescod1 = toutte.touttescode
        // where toufix.constascode > 1 and toutte.touinfscode = 1
        // $data = DB::select('Select count(touinf.touinfscode) as fecha from touinf where touinf.touinfscode = ? and ? < touinf.touinfdstat', [$request->touinfscode, $request->touinfdstat]);
        return response()->json($data);
    }
    public function tusTincazosPendientes(Request $request)
    {
        // return $request->all();
        $listaPartidosPendiente = DB::select("select toufix.toufixicode, 
toutea1.touteavimgt, 
toutea1.touteatname, 
toufix.toufixsscr1, 
toufix.toufixspen1, 
toutea2.touteavimgt AS touteavimgt2, 
toutea2.touteatname AS touteatname2, 
toufix.toufixsscr2, 
toufix.toufixspen2, 
toufix.toufixbpnlt, 
consta.constatdesc,
toufix.toufixdplay,
toufix.toufixthour, 
consta.constascode, 
consta.constatdesc, plapre.plapreicode, plapre.plapresscr1, plapre.plapresscr2
FROM toufix 
JOIN toutte toutte1 ON toufix.touttescod1 = toutte1.touttescode 
JOIN toutte toutte2 ON toufix.touttescod2 = toutte2.touttescode
JOIN toutea toutea1 ON toutte1.touteascode = toutea1.touteascode 
JOIN toutea toutea2 ON toutte2.touteascode = toutea2.touteascode 
JOIN consta ON toufix.constascode = consta.constascode AND consta.confrmicode = 3 
LEFT JOIN plapre ON toufix.toufixicode = plapre.toufixicode AND plapre.tougplicode = ? 
WHERE toutte1.touinfscode = ? AND toutte2.touinfscode = ? AND consta.constascode = 1  and (toutea1.touteatname LIKE '%" . $request->shearh . "%'  or toutea2.touteatname LIKE '%" . $request->shearh . "%')",
            [$request->tougplicode, $request->touinfscode, $request->touinfscode]);



        return response()->json([
            'listaPartidosPendiente' => $listaPartidosPendiente,
        ]);
    }

    public function tusTincazosJuego(Request $request)
    {

        $listaPartidosJuego = DB::select("Select toufix.toufixicode, toutea1.touteavimgt, toutea1.touteatname, toufix.toufixsscr1, toufix.toufixspen1, toutea2.touteavimgt as
            touteavimgt2, toutea2.touteatname as touteatname2, toufix.toufixsscr2, toufix.toufixspen2, toufix.toufixbpnlt, consta.constatdesc,
            toufix.toufixdplay,toufix.toufixthour, consta.constascode, consta.constatdesc, plapre.plapreicode, plapre.plapresscr1, plapre.plapresscr2
            from toufix join toutte toutte1 on toufix.touttescod1 = toutte1.touttescode join toutte toutte2 on toufix.touttescod2 = toutte2.touttescode
            join toutea toutea1 on toutte1.touteascode = toutea1.touteascode join toutea toutea2 on toutte2.touteascode = toutea2.touteascode join consta
            on toufix.constascode = consta.constascode and consta.confrmicode = 3 left join plapre on toufix.toufixicode = plapre.toufixicode and
            plapre.tougplicode = ? Where toutte1.touinfscode = ? and toutte2.touinfscode = ? and consta.constascode = 2
            and (toutea1.touteatname LIKE '%" . $request->shearh . "%'  or toutea2.touteatname LIKE '%" . $request->shearh . "%')",
            [$request->tougplicode, $request->touinfscode, $request->touinfscode]);
        return response()->json([
            'listaPartidosJuego' => $listaPartidosJuego,
        ]);
    }

    public function tusTincazosFinalizados(Request $request)
    {

        $listaPartidosFinalizados = DB::select("Select toufix.toufixicode, toutea1.touteavimgt, toutea1.touteatname, toufix.toufixsscr1, toufix.toufixspen1, toutea2.touteavimgt as
            touteavimgt2, toutea2.touteatname as touteatname2, toufix.toufixsscr2, toufix.toufixspen2, toufix.toufixbpnlt, consta.constatdesc,
            toufix.toufixdplay,toufix.toufixthour, consta.constascode, consta.constatdesc, plapre.plapreicode, plapre.plapresscr1, plapre.plapresscr2
            from toufix join toutte toutte1 on toufix.touttescod1 = toutte1.touttescode join toutte toutte2 on toufix.touttescod2 = toutte2.touttescode
            join toutea toutea1 on toutte1.touteascode = toutea1.touteascode join toutea toutea2 on toutte2.touteascode = toutea2.touteascode join consta
            on toufix.constascode = consta.constascode and consta.confrmicode = 3 left join plapre on toufix.toufixicode = plapre.toufixicode and
            plapre.tougplicode = ? Where toutte1.touinfscode = ? and toutte2.touinfscode = ? and consta.constascode = 3
            and (toutea1.touteatname LIKE '%" . $request->shearh . "%'  or toutea2.touteatname LIKE '%" . $request->shearh . "%') order by toufix.toufixicode desc",
            [$request->tougplicode, $request->touinfscode, $request->touinfscode]);

        return response()->json([
            'listaPartidosFinalizados' => $listaPartidosFinalizados,
        ]);
    }
    public function tablaAdminTorneos(Request $request)
    {
        $data = DB::table('touinf')->get();
        return Datatables::of($data)->make(true);

    }
    public function listaJugadoresCampeon(Request $request)
    {
        $data = DB::select('Select plainf.plainfvimgp, plainf.plainftnick from plachm join tougpl on plachm.tougplicode = tougpl.tougplicode
        join plainf on tougpl.plainficode = plainf.plainficode where tougpl.tougrpicode = ? and plachm.touttescode = ?', [Session::get('select-tougrpicode'), $request->touttescode]);
        return response()->json($data);
    }
    public function estadisticas(Request $request)
    {
        $estadisticas = DB::select('Select toutte.touttebenbl, toutea.touteavimgt, toutte.touttescode,toutea.touteatname, count(tougpl.tougplicode) as cantidad from toutea
            join toutte on toutea.touteascode = toutte.touteascode
join plachm on toutte.touttescode = plachm.touttescode join tougpl on plachm.tougplicode = tougpl.tougplicode where tougpl.tougrpicode = ?
group by  toutte.touttescode ,toutea.touteavimgt, toutea.touteatname, toutte.touttebenbl', [Session::get('select-tougrpicode')]);

        return response()->json($estadisticas);

    }
    public function tablaAdminEquipos(Request $request)
    {
        $data = DB::table('toutea')->select('toutea.*','contyp.*')
            ->join('contyp', 'contyp.contypscode', 'toutea.contypscode')
            ->where('contyp.confrmicode', 2)->where('contyp.contypscode',$request->contypscode)->orderBy('toutea.touteatname')->get();
        return Datatables::of($data)->make(true);

    }
    public function tablaAdminTorneosEquipos(Request $request)
    {
        $data = DB::table('toutea')
            ->join('contyp', 'contyp.contypscode', 'toutea.contypscode')
            ->join('toutte', 'toutte.touteascode', 'toutea.touteascode')
            ->join('touinf', 'toutte.touinfscode', 'touinf.touinfscode')

            ->where('contyp.confrmicode', 2)->where('touinf.touinfscode', $request->touinfscode)->get();
        return Datatables::of($data)->make(true);

    }

    public function obtenerPredicciones(Request $request)
    {

        $data = DB::select('Select toufix.toufixicode, toutea1.touteavimgt, toutea1.touteatname, toufix.toufixsscr1, toufix.toufixspen1, toutea2.touteavimgt as
touteavimgt2, toutea2.touteatname as touteatname2, toufix.toufixsscr2, toufix.toufixspen2, toufix.toufixbpnlt, consta.constatdesc,
toufix.toufixdplay,toufix.toufixthour, consta.constascode, consta.constatdesc, plapre.plapreicode, plapre.plapresscr1, plapre.plapresscr2, plainf.plainftnick, plapre.plaprethour, plapre.plapredcrea
From toufix join toutte toutte1 on toufix.touttescod1 = toutte1.touttescode join toutte toutte2 on toufix.touttescod2 = toutte2.touttescode
join toutea toutea1 on toutte1.touteascode = toutea1.touteascode join toutea toutea2 on toutte2.touteascode = toutea2.touteascode join consta
on toufix.constascode = consta.constascode and consta.confrmicode = 3 join plapre on toufix.toufixicode = plapre.toufixicode join tougpl
on plapre.tougplicode = tougpl.tougplicode join plainf on tougpl.plainficode = plainf.plainficode and tougpl.tougrpicode = ?
Where toutte1.touinfscode = ? and toutte2.touinfscode = ? and toufix.toufixicode = ? and toufix.constascode > 1 order by plainf.plainftnick',
            [Session::get('select-tougrpicode'), Session::get('select-touinfscode'), Session::get('select-touinfscode'), $request->toufixicode]);

        return Datatables::of($data)->make(true);

    }
    public function tableGestionarGruposAdmin(Request $request)
    {
        // $data = tougrp::join('plainf','plainf.plainficode', 'tougrp.plainficode')->where('tougrp.touinfscode', $request->touinfscode)->get();
        $data = DB::select('Select tougrp.tougrpicode , tougrp.tougrpvimgg, tougrp.tougrptname, plainf.plainftname, tougrp.tougrpdcrea, tougrp.tougrpsmaxp, tougrp.tougrpsmedp,
tougrp.tougrpsminp, (Select count(tougpl.tougplicode) from tougpl where tougpl.tougrpicode = tougrp.tougrpicode) as total
from tougrp join plainf on tougrp.plainficode = plainf.plainficode where tougrp.touinfscode = ?', [$request->touinfscode]);

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
    public function comboEquipos($touinfscode, $contypscode, Request $request)
    {

        $data = [];
        if ($request->has('q')) {
            $search = $request->q;

            $data = DB::table('toutea')->select("toutea.touteascode", "toutea.touteatname")
                ->whereNotIn('toutea.touteascode', function ($toutte) use ($touinfscode) {
                    $toutte->select('toutte.touteascode')->from('toutte')->where('toutte.touinfscode', $touinfscode);
                })->where('toutea.contypscode', $contypscode)
                ->where('toutea.touteatname','LIKE', "%$search%")
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
}

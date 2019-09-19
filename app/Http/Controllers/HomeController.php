<?php

namespace App\Http\Controllers;

use Session;
use Validator;
use App\plainf;
use App\secpin;
use App\secusr;
use App\tougrp;
use App\touinf;
use App\toutea;
use Carbon\Carbon;
use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;
use App\Mail\sendValidateMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Contracts\Encryption\DecryptException;

class HomeController extends Controller
{

    public function up(Request $request)
    {
        // $secusr = secusr::all();
        // foreach ($secusr as $key) {
        //    $key->secconnuuid = Uuid::generate(4)->string;
        //    $key->save();
        // }
    }
    public function matches(Request $request)
    {
        Session::forget('select-q');
        Session::forget('tougrp');
        Session::forget('tougpl');
        $date = Carbon::now();
        $listaConmen     = DB::table('conmem')->get();
        $listaToutea     = DB::table('toutea')->get();
        $validarTougrpbchva = DB::table('tougrp')->where('tougrpicode', Session::get('select-tougrpicode'))->first();
        $listaContypEquipos = DB::table('contyp')->whereConfrmicode(2)->get();
        return view('matches', compact(
            'listaContypEquipos',
            'listaToutea',
            'validarTougrpbchva',
        ));
        // return view('matches');
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
                    \Auth::loginUsingId($secusr->secusricode);
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
        $date = Carbon::now();
        $listaConmen     = DB::table('conmem')->get();
        $listaToutea     = DB::table('toutea')->get();
        $validarTougrpbchva = DB::table('tougrp')->where('tougrpicode', Session::get('select-tougrpicode'))->first();
        $listaContypEquipos = DB::table('contyp')->whereConfrmicode(2)->get();
        return view('partials.layout.index', compact(
            'listaContypEquipos',
            'listaToutea',
            'validarTougrpbchva',
        ));
    }

    public function guia()
    {
        Session::forget('select-q');
        Session::forget('tougrp');
        Session::forget('tougpl');
        return view('partials.guia');
    }
    public function validarCampeonFechas(Request $request)
    {
        // $data = DB::table('toufix')->select(DB::raw('count(toufix.toufixicode) as fecha'))
        //     ->join('toutte', 'toufix.touttescod1', 'toutte.touttescode')
        //     ->where('toutte.touinfscode', Session::get('select-touinfscode'))
        //     ->where('toufix.constascode', '>', 1)
        //     ->first();
        $data = DB::table('touadm')
        ->where('touadm.touinfscode', Session::get('select-touinfscode'))
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
        $listaPartidosPendiente = DB::select(
            "select toufix.toufixicode, 
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
            [Session::get('select-tougplicode'), Session::get('select-touinfscode'), Session::get('select-touinfscode')]
        );
        return response()->json([
            'listaPartidosPendiente' => $listaPartidosPendiente,
        ]);
    }
    public function matches_all_web(Request $request)
    {

        $listaPartidosPendiente = [];
        if (!empty($request->touteatname)) {
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
            toufix.toufixdplay,
            toufix.toufixthour, 
            consta.constascode, 
            consta.constatdesc FROM toufix 
            JOIN toutte toutte1 ON toufix.touttescod1 = toutte1.touttescode 
            JOIN toutte toutte2 ON toufix.touttescod2 = toutte2.touttescode
            JOIN toutea toutea1 ON toutte1.touteascode = toutea1.touteascode 
            JOIN toutea toutea2 ON toutte2.touteascode = toutea2.touteascode 
            JOIN consta ON toufix.constascode = consta.constascode AND consta.confrmicode = 3 
            WHERE toutte1.touinfscode = ? 
            AND toutte2.touinfscode = ?
            AND toufix.toufixdplay BETWEEN ? AND ?
            AND   toutea1.touteatname LIKE '{$request->touteatname}%'
            order by consta.constayorde", [$request->touinfscode, $request->touinfscode, $request->toufixdplay, $request->toufixdplay]);
        } else {

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
            toufix.toufixdplay,
            toufix.toufixthour, 
            consta.constascode, 
            consta.constatdesc FROM toufix 
            JOIN toutte toutte1 ON toufix.touttescod1 = toutte1.touttescode 
            JOIN toutte toutte2 ON toufix.touttescod2 = toutte2.touttescode
            JOIN toutea toutea1 ON toutte1.touteascode = toutea1.touteascode 
            JOIN toutea toutea2 ON toutte2.touteascode = toutea2.touteascode 
            JOIN consta ON toufix.constascode = consta.constascode AND consta.confrmicode = 3 
            WHERE toutte1.touinfscode = ? 
            AND toutte2.touinfscode = ?
            AND toufix.toufixdplay BETWEEN ? AND ?
            order by consta.constayorde", [$request->touinfscode, $request->touinfscode, $request->toufixdplay, $request->toufixdplay]);
        }
        // return $request->all();
        return response()->json($listaPartidosPendiente);
    }
    public function tusTincazosJuego(Request $request)
    {

        $listaPartidosJuego = DB::select(
            "Select toufix.toufixicode, toutea1.touteavimgt, toutea1.touteatname, toufix.toufixsscr1, toufix.toufixspen1, toutea2.touteavimgt as
            touteavimgt2, toutea2.touteatname as touteatname2, toufix.toufixsscr2, toufix.toufixspen2, toufix.toufixbpnlt, consta.constatdesc,
            toufix.toufixdplay,toufix.toufixthour, consta.constascode, consta.constatdesc, plapre.plapreicode, plapre.plapresscr1, plapre.plapresscr2
            from toufix join toutte toutte1 on toufix.touttescod1 = toutte1.touttescode join toutte toutte2 on toufix.touttescod2 = toutte2.touttescode
            join toutea toutea1 on toutte1.touteascode = toutea1.touteascode join toutea toutea2 on toutte2.touteascode = toutea2.touteascode join consta
            on toufix.constascode = consta.constascode and consta.confrmicode = 3 left join plapre on toufix.toufixicode = plapre.toufixicode and
            plapre.tougplicode = ? Where toutte1.touinfscode = ? and toutte2.touinfscode = ? and consta.constascode = 2
            and (toutea1.touteatname LIKE '%" . $request->shearh . "%'  or toutea2.touteatname LIKE '%" . $request->shearh . "%')",
            [Session::get('select-tougplicode'), Session::get('select-touinfscode'), Session::get('select-touinfscode')]
        );
        return response()->json([
            'listaPartidosJuego' => $listaPartidosJuego,
        ]);
    }
    public function tusTincazosFinalizados(Request $request)
    {

        $listaPartidosFinalizados = DB::select(
            "Select toufix.toufixicode, toutea1.touteavimgt, toutea1.touteatname, toufix.toufixsscr1, toufix.toufixspen1, toutea2.touteavimgt as
            touteavimgt2, toutea2.touteatname as touteatname2, toufix.toufixsscr2, toufix.toufixspen2, toufix.toufixbpnlt, consta.constatdesc,
            toufix.toufixdplay,toufix.toufixthour, consta.constascode, consta.constatdesc, plapre.plapreicode, plapre.plapresscr1, plapre.plapresscr2
            from toufix join toutte toutte1 on toufix.touttescod1 = toutte1.touttescode join toutte toutte2 on toufix.touttescod2 = toutte2.touttescode
            join toutea toutea1 on toutte1.touteascode = toutea1.touteascode join toutea toutea2 on toutte2.touteascode = toutea2.touteascode join consta
            on toufix.constascode = consta.constascode and consta.confrmicode = 3 left join plapre on toufix.toufixicode = plapre.toufixicode and
            plapre.tougplicode = ? Where toutte1.touinfscode = ? and toutte2.touinfscode = ? and consta.constascode = 3
            and (toutea1.touteatname LIKE '%" . $request->shearh . "%'  or toutea2.touteatname LIKE '%" . $request->shearh . "%') order by toufix.toufixicode desc",
            [Session::get('select-tougplicode'), Session::get('select-touinfscode'), Session::get('select-touinfscode')]
        );

        return response()->json([
            'listaPartidosFinalizados' => $listaPartidosFinalizados,
        ]);
    }

    public function listaJugadoresCampeon(Request $request)
    {
        $data = DB::select('Select plainf.plainfvimgp, plainf.plainftnick from plachm join tougpl on plachm.tougplicode = tougpl.tougplicode
        join plainf on tougpl.plainficode = plainf.plainficode where tougpl.tougrpicode = ? and plachm.touttescode = ?', [Session::get('select-tougrpicode'), $request->touttescode]);
        return response()->json($data);
    }
    public function estadisticas(Request $request)
    {
        $estadisticas = DB::select('Select toutte.touttebisch, toutte.touttebenbl, toutea.touteavimgt, 
        toutte.touttescode,toutea.touteatname, count(tougpl.tougplicode) as cantidad from toutea
            join toutte on toutea.touteascode = toutte.touteascode
        join plachm on toutte.touttescode = plachm.touttescode join tougpl on plachm.tougplicode = tougpl.tougplicode where tougpl.tougrpicode = ?
        group by  toutte.touttescode ,toutea.touteavimgt, toutea.touteatname, toutte.touttebenbl', [Session::get('select-tougrpicode')]);

        return response()->json($estadisticas);
    }


    public function obtenerPredicciones(Request $request)
    {

        $data = DB::select(
            'Select toufix.toufixicode, toutea1.touteavimgt, toutea1.touteatname, toufix.toufixsscr1, toufix.toufixspen1, toutea2.touteavimgt as
        touteavimgt2, toutea2.touteatname as touteatname2, toufix.toufixsscr2, toufix.toufixspen2, toufix.toufixbpnlt, consta.constatdesc,
        toufix.toufixdplay,toufix.toufixthour, consta.constascode, consta.constatdesc, plapre.plapreicode, plapre.plapresscr1, plapre.plapresscr2, plainf.plainftnick, plapre.plaprethour, plapre.plapredcrea
        From toufix join toutte toutte1 on toufix.touttescod1 = toutte1.touttescode join toutte toutte2 on toufix.touttescod2 = toutte2.touttescode
        join toutea toutea1 on toutte1.touteascode = toutea1.touteascode join toutea toutea2 on toutte2.touteascode = toutea2.touteascode join consta
        on toufix.constascode = consta.constascode and consta.confrmicode = 3 join plapre on toufix.toufixicode = plapre.toufixicode join tougpl
        on plapre.tougplicode = tougpl.tougplicode join plainf on tougpl.plainficode = plainf.plainficode and tougpl.tougrpicode = ?
        Where toutte1.touinfscode = ? and toutte2.touinfscode = ? and toufix.toufixicode = ? and toufix.constascode > 1 order by plainf.plainftnick',
            [Session::get('select-tougrpicode'), Session::get('select-touinfscode'), Session::get('select-touinfscode'), $request->toufixicode]
        );

        return Datatables::of($data)->make(true);
    }



    public function  TerminosCondiciones()
    {
        Session::forget('select-q');
        Session::forget('tougrp');
        Session::forget('tougpl');
        return view('partials.terminosCondiciones');
    }
    public function politica()
    {
        Session::forget('select-q');
        Session::forget('tougrp');
        Session::forget('tougpl');
        return view('partials.politica');
    }
}

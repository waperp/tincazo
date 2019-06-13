<?php

namespace App\Http\Controllers;

use App\Mail\info;
use App\toufix;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class toufixController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function email2(Request $request)
    {
        $date = Carbon::now();
        $data = DB::select('Select toufix.toufixicode, toutea1.touteavimgt, toutea1.touteatname, toufix.toufixsscr1, toufix.toufixspen1, toutea2.touteavimgt as
                touteavimgt2, toutea2.touteatname as touteatname2, toufix.toufixsscr2, toufix.toufixspen2, toufix.toufixbpnlt, consta.constatdesc,
                toufix.toufixdplay,toufix.toufixthour,toufix.toufixyxval ,consta.constascode, consta.constatdesc
                From toufix join toutte toutte1 on toufix.touttescod1 = toutte1.touttescode join toutte toutte2 on toufix.touttescod2 = toutte2.touttescode
                join toutea toutea1 on toutte1.touteascode = toutea1.touteascode join toutea toutea2 on toutte2.touteascode = toutea2.touteascode join consta
                on toufix.constascode = consta.constascode and consta.confrmicode = 3
                Where toufix.toufixdplay = ? order by toufix.toufixthour asc ', [$request->toufixdplay]);
        // return new \App\Mail\info($data)->render();
        return (new \App\Mail\info($data))->render();
        // Mail::to("rojasldante@gmail.com")->send(new info($data));
        // Mail::to("miguelhangelh@hotmail.com")->send(new info($data));
    }
    public function email(Request $request)
    {
        $date = Carbon::now();
        DB::beginTransaction();
        try {
            $correos = DB::select('Select secusr.secusrtmail from tougrp join tougpl on tougrp.tougrpicode = tougpl.tougrpicode join plainf on tougpl.plainficode =
            plainf.plainficode join secusr on plainf.plainficode = secusr.plainficode where tougrp.touinfscode = ? and secusr.secusrbenbl = 1', [$request->touinfscode]);
            // return response()->json($correos);

            foreach ($correos as $key) {
                $data = DB::select('Select toufix.toufixicode, toutea1.touteavimgt, toutea1.touteatname, toufix.toufixsscr1, toufix.toufixspen1, toutea2.touteavimgt as
                touteavimgt2, toutea2.touteatname as touteatname2, toufix.toufixsscr2, toufix.toufixspen2, toufix.toufixbpnlt, consta.constatdesc,
                toufix.toufixdplay,toufix.toufixthour,toufix.toufixyxval ,consta.constascode, consta.constatdesc
                From toufix join toutte toutte1 on toufix.touttescod1 = toutte1.touttescode join toutte toutte2 on toufix.touttescod2 = toutte2.touttescode
                join toutea toutea1 on toutte1.touteascode = toutea1.touteascode join toutea toutea2 on toutte2.touteascode = toutea2.touteascode join consta
                on toufix.constascode = consta.constascode and consta.confrmicode = 3
                Where toufix.toufixdplay = ? order by toufix.toufixthour asc ', [$date->toDateString()]);
                // return new \App\Mail\info($data)->render();
                // return (new \App\Mail\info($data))->render();
                Mail::to($key->secusrtmail)->send(new info($data));

            }
            DB::commit();
            return response()->json(1);
        } catch (\Exception $e) {

            DB::rollback();
            return response()->json($e->getMessage());
        }

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        DB::beginTransaction();
        try {
            $date = Carbon::now();

            if ($request->tipo == 0) {

                $toufix              = new toufix;
                $toufix->toufixdplay = Carbon::parse($request->toufixdplay)->format('Y-m-d');
                $toufix->toufixthour = $request->toufixthour;
                $toufix->constascode = 1;
                $toufix->touttescod1 = $request->touteascode1;
                $toufix->touttescod2 = $request->touteascode2;
                $toufix->toufixsscr1 = null;
                $toufix->toufixsscr2 = null;
                $toufix->toufixbpnlt = 0;
                $toufix->toufixspen1 = null;
                $toufix->toufixspen2 = null;
                $toufix->toufixyxval = $request->toufixyxval;
                $toufix->save();
            } else {

                $toufix = toufix::find($request->toufixicode);

                $toufix->touttescod1 = $request->touteascode1;
                $toufix->touttescod2 = $request->touteascode2;
                $toufix->toufixdplay = Carbon::parse($request->toufixdplay)->format('Y-m-d');
                $toufix->toufixthour = $request->toufixthour;
                $toufix->toufixyxval = $request->toufixyxval;
                $toufix->save();
            }

            DB::commit();
            return response()->json(1);
        } catch (\Exception $e) {

            DB::rollback();
            return response()->json($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\toufix  $toufix
     * @return \Illuminate\Http\Response
     */
    public function show($toufixicode)
    {
        // $data = DB::select('Select toufix.toufixicode, toutea1.touteascode, toutea1.touteatname, toutea1.touteavimgt as
        //     touteavimgt,toutea2.touteascode as touteascode2 ,toutea2.touteavimgt as
        //     touteavimgt2, toutea2.touteatname as touteatname2, toufix.toufixsscr1 ,toufix.toufixsscr2, toufix.toufixyxval, toufix.toufixthour, toufix.toufixdplay
        //     From toufix
        //     join toutte toutte1 on toufix.touttescod1 = toutte1.touttescode
        //     join toutte toutte2 on toufix.touttescod2 = toutte2.touttescode
        //     join toutea toutea1 on toutte1.touteascode = toutea1.touteascode
        //     join toutea toutea2 on toutte2.touteascode = toutea2.touteascode
        //     Where toufix.toufixicode =  ?', [$toufixicode]);
        $toufixValidate = DB::table('toufix')->where('toufixicode', $toufixicode)->first();
        if ($toufixValidate->constascode == 1) {
            $toufix = toufix::select('toufix.toufixicode', 'toutea1.touteascode', 'toutea1.touteatname', 'toutea1.touteavimgt',
                DB::raw('toutea2.touteascode as touteascode2'), DB::raw('toutea2.touteatname as touteatname2'), DB::raw('toutea2.touteavimgt as touteavimgt2'), 'toufix.toufixsscr1', 'toufix.toufixsscr2', 'toufix.toufixyxval', 'toufix.toufixthour', 'toufix.toufixdplay')
                ->join(DB::raw('toutte toutte1'), 'toufix.touttescod1', 'toutte1.touttescode')
                ->join(DB::raw('toutte toutte2'), 'toufix.touttescod2', 'toutte2.touttescode')
                ->join(DB::raw('toutea toutea1'), 'toutte1.touteascode', 'toutea1.touteascode')
                ->join(DB::raw('toutea toutea2'), 'toutte2.touteascode', 'toutea2.touteascode')
                ->where('toufix.toufixicode', $toufixicode)
                ->first();
            $toufix->toufixdplay = Carbon::parse($toufix->toufixdplay)->format('d-m-Y');
            return response()->json(['toufix' => $toufix, 'mensaje' => 0]);
        } else {
            return response()->json(['toufix' => $toufixValidate, 'mensaje' => 1]);
        }

    }

    public function show1($toufixicode)
    {

        $toufix = toufix::select('toutte1.touttescode as touttescode1','toutte2.touttescode as touttescode2','toufix.toufixicode', 'toutea1.touteascode', 'toutea1.touteatname', 'toutea1.touteavimgt',
            DB::raw('toutea2.touteascode as touteascode2'), DB::raw('toutea2.touteatname as touteatname2'), DB::raw('toutea2.touteavimgt as touteavimgt2'), 'toufix.toufixsscr1', 'toufix.toufixsscr2', 'toufix.toufixyxval', 'toufix.toufixthour', 'toufix.toufixdplay')
            ->join(DB::raw('toutte toutte1'), 'toufix.touttescod1', 'toutte1.touttescode')
            ->join(DB::raw('toutte toutte2'), 'toufix.touttescod2', 'toutte2.touttescode')
            ->join(DB::raw('toutea toutea1'), 'toutte1.touteascode', 'toutea1.touteascode')
            ->join(DB::raw('toutea toutea2'), 'toutte2.touteascode', 'toutea2.touteascode')
            ->where('toufix.toufixicode', $toufixicode)
            ->first();
        $toufix->toufixdplay = Carbon::parse($toufix->toufixdplay)->format('d-m-Y');
        return response()->json($toufix);

    }
    public function enJuego(Request $request)
    {
        $toufix = toufix::find($request->toufixicode);

        $toufix->toufixsscr1 = 0;
        $toufix->toufixsscr2 = 0;
        $toufix->constascode = 2;

        $toufix->save();
        return response()->json($toufix);
    }
    public function editarScore(Request $request)
    {
        $toufix = toufix::find($request->toufixicode);

        $toufix->toufixsscr1 = $request->toufixsscr1;
        $toufix->toufixsscr2 = $request->toufixsscr2;

        $toufix->save();
        return response()->json($toufix);
    }

    public function procesarPartido(Request $request)
    {
        DB::beginTransaction();
        try {
            $toufix = toufix::find($request->toufixicode);

            $toufix->constascode = 3;

            $toufix->save();
            // DB::statement('Update tougpl Set tougpl.tougplipwin = tougpl.tougplipwin + IsNull((Select Case
            // When toufix.toufixsscr1 = plapre.plapresscr1 and toufix.toufixsscr2 = plapre.plapresscr2 then tougrp.tougrpsmaxp * toufix.toufixyxval
            // When toufix.toufixsscr1 > toufix.toufixsscr2 and plapre.plapresscr1 > plapre.plapresscr2 then tougrp.tougrpsmedp * toufix.toufixyxval
            // When toufix.toufixsscr1 = toufix.toufixsscr2 and plapre.plapresscr1 = plapre.plapresscr2 then tougrp.tougrpsmedp * toufix.toufixyxval
            // When toufix.toufixsscr1 < toufix.toufixsscr2 and plapre.plapresscr1 < plapre.plapresscr2 then tougrp.tougrpsmedp * toufix.toufixyxval
            // When toufix.toufixsscr1 = plapre.plapresscr1 then tougrp.tougrpsminp * toufix.toufixyxval
            // When toufix.toufixsscr2 = plapre.plapresscr2 then tougrp.tougrpsminp * toufix.toufixyxval Else 0 End
            // from toufix join plapre on toufix.toufixicode = plapre.toufixicode join tougpl tougpl1 on plapre.tougplicode = tougpl1.tougplicode
            // join tougrp on tougpl1.tougrpicode = tougrp.tougrpicode where toufix.toufixicode = ? and tougpl1.tougplicode = tougpl.tougplicode),0),
            // tougpl.tougplsmaxp = tougpl.tougplsmaxp + IsNull((Select Case When toufix.toufixsscr1 = plapre.plapresscr1 and toufix.toufixsscr2 = plapre.plapresscr2 then 1
            // Else 0 End from toufix join plapre on toufix.toufixicode = plapre.toufixicode join tougpl tougpl1 on plapre.tougplicode = tougpl1.tougplicode
            // join tougrp on tougpl1.tougrpicode = tougrp.tougrpicode where toufix.toufixicode = ? and tougpl1.tougplicode = tougpl.tougplicode),0),
            // tougpl.tougplsmedp = tougpl.tougplsmedp + IsNull((Select Case When toufix.toufixsscr1 = plapre.plapresscr1 and toufix.toufixsscr2 = plapre.plapresscr2 then 0
            // When toufix.toufixsscr1 > toufix.toufixsscr2 and plapre.plapresscr1 > plapre.plapresscr2 then 1
            // When toufix.toufixsscr1 = toufix.toufixsscr2 and plapre.plapresscr1 = plapre.plapresscr2 then 1
            // When toufix.toufixsscr1 < toufix.toufixsscr2 and plapre.plapresscr1 < plapre.plapresscr2 then 1
            // Else 0 End from toufix join plapre on toufix.toufixicode = plapre.toufixicode join tougpl tougpl1 on plapre.tougplicode = tougpl1.tougplicode
            // join tougrp on tougpl1.tougrpicode = tougrp.tougrpicode where toufix.toufixicode = ? and tougpl1.tougplicode = tougpl.tougplicode),0),
            // tougpl.tougplslowp = tougpl.tougplslowp + IsNull((Select Case When toufix.toufixsscr1 = plapre.plapresscr1 and toufix.toufixsscr2 = plapre.plapresscr2 then 0
            // When toufix.toufixsscr1 > toufix.toufixsscr2 and plapre.plapresscr1 > plapre.plapresscr2 then 0
            // When toufix.toufixsscr1 = toufix.toufixsscr2 and plapre.plapresscr1 = plapre.plapresscr2 then 0
            // When toufix.toufixsscr1 < toufix.toufixsscr2 and plapre.plapresscr1 < plapre.plapresscr2 then 0
            // When toufix.toufixsscr1 = plapre.plapresscr1 then 1
            // When toufix.toufixsscr2 = plapre.plapresscr2 then 1
            // Else 0 End from toufix join plapre on toufix.toufixicode = plapre.toufixicode join tougpl tougpl1 on plapre.tougplicode = tougpl1.tougplicode
            // join tougrp on tougpl1.tougrpicode = tougrp.tougrpicode where toufix.toufixicode = ? and tougpl1.tougplicode = tougpl.tougplicode),0)
            // From plapre Where tougpl.tougplicode = plapre.tougplicode and plapre.toufixicode = ?', [$request->toufixicode, $request->toufixicode, $request->toufixicode, $request->toufixicode, $request->toufixicode]);

            DB::statement('update tougpl JOIN plapre ON tougpl.tougplicode = plapre.tougplicode AND plapre.toufixicode = ?
SET tougpl.tougplipwin = tougpl.tougplipwin + IFNULL((SELECT CASE WHEN toufix.toufixsscr1 = plapre.plapresscr1 AND toufix.toufixsscr2 =
plapre.plapresscr2 THEN tougrp.tougrpsmaxp * tougrp.tougrpsxval WHEN toufix.toufixsscr1 > toufix.toufixsscr2 AND plapre.plapresscr1 >
plapre.plapresscr2 THEN tougrp.tougrpsmedp * tougrp.tougrpsxval WHEN toufix.toufixsscr1 = toufix.toufixsscr2 AND plapre.plapresscr1 =
plapre.plapresscr2 THEN tougrp.tougrpsmedp * tougrp.tougrpsxval WHEN toufix.toufixsscr1 < toufix.toufixsscr2 AND plapre.plapresscr1 <
plapre.plapresscr2 THEN tougrp.tougrpsmedp * tougrp.tougrpsxval WHEN toufix.toufixsscr1 = plapre.plapresscr1 THEN tougrp.tougrpsminp *
tougrp.tougrpsxval WHEN toufix.toufixsscr2 = plapre.plapresscr2 THEN tougrp.tougrpsminp * tougrp.tougrpsxval ELSE 0 END
FROM toufix JOIN plapre ON toufix.toufixicode = plapre.toufixicode JOIN tougpl tougpl1 ON plapre.tougplicode = tougpl1.tougplicode
JOIN tougrp ON tougpl1.tougrpicode = tougrp.tougrpicode WHERE toufix.toufixicode = ? AND tougpl1.tougplicode = tougpl.tougplicode),0),
tougpl.tougplsmaxp = tougpl.tougplsmaxp + IFNULL((SELECT CASE WHEN toufix.toufixsscr1 = plapre.plapresscr1 AND toufix.toufixsscr2 =
plapre.plapresscr2 THEN 1 ELSE 0 END FROM toufix JOIN plapre ON toufix.toufixicode = plapre.toufixicode JOIN tougpl tougpl1 ON
plapre.tougplicode = tougpl1.tougplicode JOIN tougrp ON tougpl1.tougrpicode = tougrp.tougrpicode WHERE toufix.toufixicode = ? AND
tougpl1.tougplicode = tougpl.tougplicode),0),
tougpl.tougplsmedp = tougpl.tougplsmedp + IFNULL((SELECT CASE WHEN toufix.toufixsscr1 = plapre.plapresscr1 AND toufix.toufixsscr2 =
plapre.plapresscr2 THEN 0 WHEN toufix.toufixsscr1 > toufix.toufixsscr2 AND plapre.plapresscr1 > plapre.plapresscr2 THEN 1 WHEN
toufix.toufixsscr1 = toufix.toufixsscr2 AND plapre.plapresscr1 = plapre.plapresscr2 THEN 1 WHEN toufix.toufixsscr1 < toufix.toufixsscr2
AND plapre.plapresscr1 < plapre.plapresscr2 THEN 1 ELSE 0 END FROM toufix JOIN plapre ON toufix.toufixicode = plapre.toufixicode JOIN
tougpl tougpl1 ON plapre.tougplicode = tougpl1.tougplicode JOIN tougrp ON tougpl1.tougrpicode = tougrp.tougrpicode
WHERE toufix.toufixicode = ? AND tougpl1.tougplicode = tougpl.tougplicode),0),
tougpl.tougplslowp = tougpl.tougplslowp + IFNULL((SELECT CASE WHEN toufix.toufixsscr1 = plapre.plapresscr1 AND toufix.toufixsscr2 =
plapre.plapresscr2 THEN 0 WHEN toufix.toufixsscr1 > toufix.toufixsscr2 AND plapre.plapresscr1 > plapre.plapresscr2 THEN 0
WHEN toufix.toufixsscr1 = toufix.toufixsscr2 AND plapre.plapresscr1 = plapre.plapresscr2 THEN 0
WHEN toufix.toufixsscr1 < toufix.toufixsscr2 AND plapre.plapresscr1 < plapre.plapresscr2 THEN 0
WHEN toufix.toufixsscr1 = plapre.plapresscr1 THEN 1 WHEN toufix.toufixsscr2 = plapre.plapresscr2 THEN 1
ELSE 0 END FROM toufix JOIN plapre ON toufix.toufixicode = plapre.toufixicode JOIN tougpl tougpl1 ON plapre.tougplicode = tougpl1.tougplicode
JOIN tougrp ON tougpl1.tougrpicode = tougrp.tougrpicode WHERE toufix.toufixicode = ? AND tougpl1.tougplicode = tougpl.tougplicode),0)', [$request->toufixicode, $request->toufixicode, $request->toufixicode, $request->toufixicode, $request->toufixicode]);

//             DB::statement('Update plapre set plapre.plapresptos = IsNull((Select Case
            // When toufix.toufixsscr1 = plapre.plapresscr1 and toufix.toufixsscr2 = plapre.plapresscr2 then tougrp.tougrpsmaxp * toufix.toufixyxval
            // When toufix.toufixsscr1 > toufix.toufixsscr2 and plapre.plapresscr1 > plapre.plapresscr2 then tougrp.tougrpsmedp * toufix.toufixyxval
            // When toufix.toufixsscr1 = toufix.toufixsscr2 and plapre.plapresscr1 = plapre.plapresscr2 then tougrp.tougrpsmedp * toufix.toufixyxval
            // When toufix.toufixsscr1 < toufix.toufixsscr2 and plapre.plapresscr1 < plapre.plapresscr2 then tougrp.tougrpsmedp * toufix.toufixyxval
            // When toufix.toufixsscr1 = plapre.plapresscr1 then tougrp.tougrpsminp * toufix.toufixyxval
            // When toufix.toufixsscr2 = plapre.plapresscr2 then tougrp.tougrpsminp * toufix.toufixyxval Else 0 End
            // from toufix join plapre on toufix.toufixicode = plapre.toufixicode join tougpl tougpl1 on plapre.tougplicode = tougpl1.tougplicode
            // join tougrp on tougpl1.tougrpicode = tougrp.tougrpicode where toufix.toufixicode = ? and tougpl1.tougplicode = tougpl.tougplicode),0)
            // From tougpl Where plapre.tougplicode = tougpl.tougplicode and plapre.toufixicode = ?', [$request->toufixicode, $request->toufixicode]);

            DB::statement('update plapre 
JOIN tougpl ON tougpl.`tougplicode` = plapre.`tougplicode`
JOIN tougrp ON tougpl.tougrpicode = tougrp.tougrpicode
AND plapre.tougplicode = tougpl.tougplicode AND plapre.toufixicode = 65 SET plapre.plapresxval = tougrp.tougrpsxval,plapre.plapresptos = IFNULL((SELECT CASE
WHEN toufix.toufixsscr1 = plapre.plapresscr1 AND toufix.toufixsscr2 = plapre.plapresscr2 THEN tougrp.tougrpsmaxp * tougrp.tougrpsxval
WHEN toufix.toufixsscr1 > toufix.toufixsscr2 AND plapre.plapresscr1 > plapre.plapresscr2 THEN tougrp.tougrpsmedp * tougrp.tougrpsxval
WHEN toufix.toufixsscr1 = toufix.toufixsscr2 AND plapre.plapresscr1 = plapre.plapresscr2 THEN tougrp.tougrpsmedp * tougrp.tougrpsxval
WHEN toufix.toufixsscr1 < toufix.toufixsscr2 AND plapre.plapresscr1 < plapre.plapresscr2 THEN tougrp.tougrpsmedp * tougrp.tougrpsxval
WHEN toufix.toufixsscr1 = plapre.plapresscr1 THEN tougrp.tougrpsminp * tougrp.tougrpsxval
WHEN toufix.toufixsscr2 = plapre.plapresscr2 THEN tougrp.tougrpsminp * tougrp.tougrpsxval ELSE 0 END
FROM toufix JOIN plapre ON toufix.toufixicode = plapre.toufixicode JOIN tougpl tougpl1 ON plapre.tougplicode = tougpl1.tougplicode
JOIN tougrp ON tougpl1.tougrpicode = tougrp.tougrpicode WHERE toufix.toufixicode = 65  AND tougpl1.tougplicode = tougpl.tougplicode),0)', [$request->toufixicode, $request->toufixicode]);
            DB::commit();
            return response()->json(
                ['error' => false, 'success' => true, 'types' => 'update']);

        } catch (\Exception $e) {

            DB::rollback();
            return response()->json(
                ['error' => true, 'errors' => $e->getMessage() ,'success' => false, 'types' => 'server']);
        }
    }
    public function suspender(Request $request)
    {
        $toufix = toufix::find($request->toufixicode);

        $toufix->constascode = 0;

        $toufix->save();
        return response()->json($toufix);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\toufix  $toufix
     * @return \Illuminate\Http\Response
     */
    public function edit(toufix $toufix)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\toufix  $toufix
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, toufix $toufix)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\toufix  $toufix
     * @return \Illuminate\Http\Response
     */
    public function destroy(toufix $toufix)
    {
        //
    }
}

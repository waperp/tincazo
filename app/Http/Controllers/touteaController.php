<?php

namespace App\Http\Controllers;

use App\toutea;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class touteaController extends Controller
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
                if ($request->hasFile('touteavimgt')) {

                    $imageName = str_random(30) . '.' . $request->file('touteavimgt')->getClientOriginalExtension();
                    $request->file('touteavimgt')->move(base_path() . '/public/images/', $imageName);
                } else {
                    $imageName = "default.jpg";
                }
                $toutea              = new toutea;
                $toutea->touteatname = $request->touteatname;
                $toutea->touteatabrv = $request->touteatabrv;
                $toutea->touteavimgt = $imageName;
                $toutea->contypscode = $request->contypscode;
                $toutea->save();
            } else {
                if ($request->hasFile('touteavimgt')) {

                    $imageName = str_random(30) . '.' . $request->file('touteavimgt')->getClientOriginalExtension();
                    $request->file('touteavimgt')->move(base_path() . '/public/images/', $imageName);
                } else {
                    $imageName = "null";
                }
                $toutea = toutea::find($request->touteascode);

                $toutea->touteatname = $request->touteatname;
                $toutea->touteatabrv = $request->touteatabrv;
                $toutea->contypscode = $request->contypscode;
                if ($imageName != "null") {
                    $toutea->touteavimgt = $imageName;
                }
                $toutea->save();
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
     * @param  \App\toutea  $toutea
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $toutea = toutea::find($id);
        return response()->json($toutea);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\toutea  $toutea
     * @return \Illuminate\Http\Response
     */
    public function edit(toutea $toutea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\toutea  $toutea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, toutea $toutea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\toutea  $toutea
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $toutea = toutea::where('touteascode', $id)->delete();
        return response()->json($toutea);
    }
    public function tieneDatosTorneo(Request $request)
    {
        $data = DB::table('toutte')->select(DB::raw('count(toutte.touteascode) as cantidad'))->where('toutte.touteascode', $request->touteascode)->first();
        return response()->json($data->cantidad);

    }
    public function tieneDatosFix(Request $request)
    {
        $data = DB::table('toufix')->select(DB::raw('count(toufix.toufixicode) as cantidad'))
            ->where('toufix.touttescod1', $request->touttescode)->orWhere('toufix.touttescod2', $request->touttescode)->first();
        return response()->json($data->cantidad);

    }
    public function eliminarTorneoEquipo(Request $request)
    {
        // $data = DB::select('Select count(toutte.touteascode) as cantidad from toutte where toutte.touteascode = ?',[$id]);
        $data = DB::table('toutte')->where('toutte.touteascode', $request->touteascode)->where('toutte.touinfscode', $request->touinfscode)->delete();
        return response()->json($data);

    }
     public function EstadoEquipoTorneo(Request $request)
    {
        // $data = DB::select('Select count(toutte.touteascode) as cantidad from toutte where toutte.touteascode = ?',[$id]);
        $data = DB::table('toutte')
        ->where('toutte.touteascode', $request->touteascode)
        ->where('toutte.touinfscode', $request->touinfscode)
        ->where('toutte.touttescode', $request->touttescode)
        ->update([
            'touttebenbl' => 0
        ]);
        return response()->json($data);

    }
    public function agregarTorneosEquipos(Request $request)
    {
        // $data = DB::select('Select count(toutte.touteascode) as cantidad from toutte where toutte.touteascode = ?',[$id]);

        foreach ($request->equipos as $key => $value) {
            $data = DB::table('toutte')->insert([
                'touinfscode' => $request->touinfscode,
                'touteascode' => $value,
                'touttebenbl' => 1,

            ]);
        }
        return response()->json($data);

        return response()->json($request->all());

    }

    public function insertarCampeon(Request $request)
    {
        // $validar = DB::select('Select count(plachm.plachmicode) from plachm
        //     join toutte on plachm.touttescode = toutte.touttescode
        //     join tougrp on toutte.touinfscode =
        //     tougrp.touinfscode where plachm.plainficode = ? and tougrp.tougrpicode = ?', [Session::get('plainficode'), $request->tougrpicode]);
        DB::beginTransaction();
        try {

            $date        = Carbon::now();
            // $validTorneo = DB::table('touinf')->select(DB::raw('count(touinf.touinfscode) as fecha'))
            //     ->where('touinf.touinfscode', $request->touinfscode)
            //     ->where('touinf.touinfdstat', '>', $request->touinfdstat)
            //     ->first();
             $validTorneo = DB::table('toufix')->select(DB::raw('count(toufix.toufixicode) as fecha'))
            ->join('toutte','toufix.touttescod1','toutte.touttescode')
            ->where('toutte.touinfscode', $request->touinfscode)
            ->where('toufix.constascode', '>', 1)
            ->first();
            $validar = DB::table('plachm')->select(DB::raw('count(plachm.plachmicode) as tiene'), 'plachm.plachmicode')
                ->join('toutte', 'plachm.touttescode', 'toutte.touttescode')
                ->join('tougrp', 'toutte.touinfscode', 'tougrp.touinfscode')
                ->where('plachm.tougplicode', $request->tougplicode)
                ->where('tougrp.tougrpicode', $request->tougrpicode)->groupBy('plachm.plachmicode')->first();

            // return response()->json($validar);
            if ($validTorneo->fecha <= 0) {
                if ($validar != null) {
                    // return response()->json("si");

                    $data = DB::table('plachm')
                        ->where('plachmicode', $validar->plachmicode)
                        ->update([
                            'touttescode' => $request->touttescode,
                        ]);

                } else {
                    $data = DB::table('plachm')
                        ->insert([
                            'plachmdcrea' => $date->toDateString(),
                            'plachmthour' => $date->toTimeString(),
                            'touttescode' => $request->touttescode,
                            'tougplicode' => $request->tougplicode,
                        ]);
                }
            }

            DB::commit();
            return response()->json($validTorneo);
        } catch (\Exception $e) {

            DB::rollback();
            return response()->json($e->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\tougpl;
use App\tougrp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Validator;

class tougrpController extends Controller
{
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $date = Carbon::now();
            // return response()->json($request->all());
            $menbresia = DB::select('Select conmem.conmemsnumg - count(tougrp.tougrpicode) as value from conmem join plainf on conmem.conmemscode = plainf.conmemscode left join tougrp on plainf.plainficode = tougrp.plainficode where plainf.plainficode = ?
                group by conmem.conmemsnumg', [Session::get('plainficode')]);
            $valueMensabresia = "";
            foreach ($menbresia as $key) {
                $valueMensabresia = $key->value;
            }
            $validateValue = (int) $valueMensabresia;
            // return response()->json($validateValue);

            if ($validateValue > 0) {
                if ($request->hasFile('tougrpvimgg')) {

                    $imageName = str_random(30) . '.' . $request->file('tougrpvimgg')->getClientOriginalExtension();
                    $request->file('tougrpvimgg')->move(base_path() . '/public/images/', $imageName);
                } else {
                    $imageName = "default.jpg";
                }

                $tougrp              = new tougrp;
                $tougpl              = new tougpl;
                $tougrp->tougrptname = $request->tougrptname;
                $tougrp->tougrpdcrea = $date->toDateString();
                $tougrp->touinfscode = $request->touinfscode;
                $tougrp->tougrpvimgg = $imageName;
                $tougrp->tougrpbenbl = 1;
                $tougrp->tougrpsmaxp = 1;
                $tougrp->tougrpsmedp = 1;
                $tougrp->tougrpsminp = 1;
                $tougrp->tougrpsxval = 1;
                $tougrp->tougrpbchva = 1;
                $tougrp->plainficode = Session::get('plainficode');
                $tougrp->save();

                $tougpl->tougrpicode = $tougrp->tougrpicode;
                $tougpl->plainficode = Session::get('plainficode');
                $tougpl->tougplipwin = 0;
                $tougpl->tougplsmaxp = 0;
                $tougpl->constascode = 2;
                $tougpl->tougplsmedp = 0;
                $tougpl->tougplslowp = 0;

                $tougpl->save();
                DB::commit();

                return response()->json($validateValue);

            } else {
                return response()->json(false);

            }

        } catch (\Exception $e) {

            DB::rollback();
            return response()->json($e->getMessage());
        }
    }
    public function invitarJugador(Request $request)
    {
        DB::beginTransaction();
        try {
            $menbresia = DB::select('Select conmem.conmemsnump - count(tougpl.tougplicode) as value from conmem join plainf on conmem.conmemscode = plainf.conmemscode left join tougrp
                on plainf.plainficode = tougrp.plainficode left join tougpl on tougrp.tougrpicode = tougpl.tougrpicode where
                tougrp.plainficode = ? and
                tougpl.tougrpicode = ? group by conmem.conmemsnump', [Session::get('plainficode'), Session::get('select-tougrpicode')]);
            $valueMensabresia = "";
            foreach ($menbresia as $key) {
                $valueMensabresia = $key->value;
            }
            $validateValue = (int) $valueMensabresia;

            if ($validateValue > 0) {
                $tougpl              = new tougpl;
                $tougpl->tougrpicode = $request->tougrpicode;
                $tougpl->constascode = 1;
                $tougpl->plainficode = $request->plainficode;
                $tougpl->tougplipwin = 0;
                $tougpl->tougplsmaxp = 0;
                $tougpl->tougplsmedp = 0;
                $tougpl->tougplslowp = 0;
                $tougpl->save();
                DB::commit();
                return response()->json($validateValue);

            } else {
                return response()->json(false);

            }

        } catch (\Exception $e) {

            DB::rollback();
            return response()->json($e->getMessage());
        }
    }
    public function aceptarInvitacion(Request $request)
    {
        DB::beginTransaction();
        try {

            $tougpl              = tougpl::where('tougrpicode', $request->tougrpicode)->where('plainficode', Session::get('plainficode'))->first();
            $tougpl->constascode = $request->constascode;
            $tougpl->save();

            DB::commit();
            return response()->json($tougpl);
        } catch (\Exception $e) {

            DB::rollback();
            return response()->json($e->getMessage());
        }
    }

    public function adminUpdateTougrp(Request $request)
    {
        DB::beginTransaction();
        try {
            $date = Carbon::now();
            if ($request->tipo == 0) {
                // return response()->json($request->all());

                if ($request->hasFile('tougrpvimgg')) {
                    $imageName = str_random(30) . '.' . $request->file('tougrpvimgg')->getClientOriginalExtension();
                    $request->file('tougrpvimgg')->move(base_path() . '/public/images/', $imageName);
                } else {
                    $imageName = "default.jpg";
                }

                $tougrp              = new tougrp;
                $tougpl              = new tougpl;
                $tougrp->tougrptname = $request->tougrptname;
                $tougrp->tougrpdcrea = $date->toDateString();
                $tougrp->touinfscode = $request->touinfscode;
                $tougrp->tougrpvimgg = $imageName;
                $tougrp->tougrpbenbl = 1;
                $tougrp->tougrpsmaxp = $request->tougrpsmaxp;
                $tougrp->tougrpsmedp = $request->tougrpsmedp;
                $tougrp->tougrpsminp = $request->tougrpsminp;
                $tougrp->tougrpsxval = $request->tougrpsxval;
                $tougrp->plainficode = $request->plainficode;
                $tougrp->save();

                $tougpl->tougrpicode = $tougrp->tougrpicode;
                $tougpl->plainficode = $request->plainficode;
                $tougpl->tougplipwin = 0;
                $tougpl->tougplsmaxp = 0;
                $tougpl->constascode = 2;
                $tougpl->tougplsmedp = 0;
                $tougpl->tougplslowp = 0;
                $tougpl->save();
                Session::forget('select-tougrpsxval');
                Session::put('select-tougrpsxval', $tougrp->tougrpsxval);

            } else {
                if ($request->hasFile('tougrpvimgg')) {
                    $imageName = str_random(30) . '.' . $request->file('tougrpvimgg')->getClientOriginalExtension();
                    $request->file('tougrpvimgg')->move(base_path() . '/public/images/', $imageName);
                } else {
                    $imageName = null;
                }

                $tougrp              = tougrp::find($request->tougrpicode);
                $tougrp->tougrptname = $request->tougrptname;
                $tougrp->plainficode = $request->plainficode;
                $tougrp->touinfscode = $request->touinfscode;
                $tougrp->tougrpsmaxp = $request->tougrpsmaxp;
                $tougrp->tougrpsmedp = $request->tougrpsmedp;
                $tougrp->tougrpsminp = $request->tougrpsminp;
                $tougrp->tougrpsxval = $request->tougrpsxval;

                if ($imageName == null) {
                } else {
                    $tougrp->tougrpvimgg = $imageName;
                }
                $tougrp->save();
                Session::forget('select-tougrpsxval');
                Session::put('select-tougrpsxval', $tougrp->tougrpsxval);
            }

            DB::commit();
            return response()->json($tougrp);
        } catch (\Exception $e) {

            DB::rollback();
            return response()->json($e->getMessage());
        }
    }
    public function updateTougrp(Request $request)
    {
        DB::beginTransaction();
        try {
            $date = Carbon::now();
            if ($request->hasFile('tougrpvimgg')) {
                $imageName = str_random(30) . '.' . $request->file('tougrpvimgg')->getClientOriginalExtension();
                $request->file('tougrpvimgg')->move(base_path() . '/public/images/', $imageName);
            } else {
                $imageName = null;
            }
            // return response()->json($request->all());

            $validator = Validator::make($request->all(), [
                'tougrpicode' => 'required',
                'tougrptname' => 'required',
                'touinfscode' => 'required',
                'tougrpsmaxp' => 'required|numeric|min:3|max:100',
                'tougrpsmedp' => 'required|numeric|min:2|max:100',
                'tougrpsminp' => 'required|numeric|min:1|max:100',
                'tougrpsxval' => 'required|numeric|min:1|max:10',
            ]);
            $fechaValidar = DB::table('touinf')->select(DB::raw('count(touinf.touinfscode) as fecha'))
                ->where('touinf.touinfscode', Session::get('select-touinfscode'))
                ->where('touinf.touinfdstat', '>', $date->toDateString())
                ->first();
            $validarTougrpbchva = DB::table('tougrp')->where('tougrpicode', Session::get('select-tougrpicode'))->first();
            // return response()->json($validarTougrpbchva->tougrpbchva);
            if ($validator->passes()) {
                if ($validarTougrpbchva->tougrpbchva == 1) {
                    if ($fechaValidar->fecha <= 0) {
                        $tougrp              = tougrp::find(Session::get('select-tougrpicode'));
                        $tougrp->tougrptname = $request->tougrptname;
                        $tougrp->touinfscode = $request->touinfscode;
                        $tougrp->tougrpsmaxp = $request->tougrpsmaxp;
                        $tougrp->tougrpsmedp = $request->tougrpsmedp;
                        $tougrp->tougrpsminp = $request->tougrpsminp;
                        $tougrp->tougrpsxval = $request->tougrpsxval;
                        $tougrp->tougrpbchva = 0;
                        if ($imageName == null) {
                        } else {
                            $tougrp->tougrpvimgg = $imageName;
                        }
                        $tougrp->save();
                        Session::forget('select-tougrpsxval');
                        Session::put('select-tougrpsxval', $tougrp->tougrpsxval);
                    } else {
                        $tougrp              = tougrp::find(Session::get('select-tougrpicode'));
                        $tougrp->tougrptname = $request->tougrptname;
                        $tougrp->touinfscode = $request->touinfscode;
                        $tougrp->tougrpsxval = $request->tougrpsxval;
                        
                        if ($imageName == null) {
                        } else {
                            $tougrp->tougrpvimgg = $imageName;
                        }
                        $tougrp->save();
                        Session::forget('select-tougrpsxval');
                        Session::put('select-tougrpsxval', $tougrp->tougrpsxval);
                    }
                }else{
                     return response()->json(
                    ['message' => 'No puede cambiar el valor de tougrpbchva ', 'errors' => $validator->errors(), 'error' => true, 'success' => false, 'types' => 'validate']);
                }

            } else {
                return response()->json(
                    ['message' => 0, 'errors' => $validator->errors(), 'error' => true, 'success' => false, 'types' => 'validate']);
            }

            DB::commit();
            return response()->json(
                ['message' => 0, 'errors' => $validator->errors()->all(), 'error' => false, 'success' => true, 'types' => 'update']);
        } catch (\Exception $e) {

            DB::rollback();
            return response()->json($e->getMessage());
        }
    }
    
    public function show($id)
    {
        $data = tougrp::
            join('plainf', 'plainf.plainficode', 'tougrp.plainficode')
            ->join('touinf', 'tougrp.touinfscode', 'touinf.touinfscode')
            ->where('tougrp.tougrpicode', $id)->first();
        return response()->json($data);

    }
}

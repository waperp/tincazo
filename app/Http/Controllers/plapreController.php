<?php

namespace App\Http\Controllers;

use App\plapre;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Validator;

class plapreController extends Controller
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
        /*return $request->all();*/
        DB::beginTransaction();
        try {
            $toufix    = DB::table('toufix')->where('toufixicode', $request->toufixicode)->first();
            $validator = Validator::make($request->all(), [
                'toufixsscr2' => 'required|numeric|min:0',
                'toufixsscr1' => 'required|numeric|min:0',
                'toufixicode' => 'required',
            ]);
            if ($validator->passes()) {
                $date = Carbon::now();
                if ($toufix->constascode == 1) {
                    if ($request->plapreicode == null) {
                    

                        $plapre              = new plapre;
                        $plapre->plapredcrea = $date->toDateString();
                        $plapre->plaprethour = $date->toTimeString();
                        $plapre->tougplicode = Session::get('select-tougplicode');
                        $plapre->toufixicode = $request->toufixicode;
                        $plapre->plapresscr1 = $request->toufixsscr1;
                        $plapre->plapresscr2 = $request->toufixsscr2;
                        $plapre->plapresxval = Session::get('select-tougrpsxval');;
                        $plapre->plapresptos = 0;
                        $plapre->plaprebenbl = 1;
                        $plapre->save();
                        DB::commit();
                        return response()->json(
                            ['message' => 0, 'errors' => $validator->errors()->all(), 'error' => false, 'success' => true, 'types' => 'insert']);
                    } else {
                        $plapre = plapre::where('plapreicode', $request->plapreicode)
                            ->where('toufixicode', $request->toufixicode)
                            ->where('tougplicode', Session::get('select-tougplicode'))
                            ->first();

                        if ($plapre) {
                            $plapre->plapresscr1 = $request->toufixsscr1;
                            $plapre->plapresscr2 = $request->toufixsscr2;
                            $plapre->plapredcrea = $date->toDateString();
                            $plapre->plaprethour = $date->toTimeString();
                            $plapre->save();
                            DB::commit();
                        } else {
                            return response()->json(
                                ['message' => 0, 'errors' => $validator->errors()->all(), 'error' => true, 'success' => false, 'types' => 'update']);
                        }
                        return response()->json(
                            ['message' => 0, 'errors' => $validator->errors()->all(), 'error' => false, 'success' => true, 'types' => 'update']);

                    }
                } else {
                    return response()->json(['message' => 1, 'errors' => $validator->errors()->all(), 'error' => true, 'success' => false, 'types' => 'constascode']);
                }
            } else {
                return response()->json(
                    ['message' => 0, 'errors' => $validator->errors()->all(), 'error' => true, 'success' => false, 'types' => 'validate']);
            }
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(
                ['message' => 0, 'errors' => $e->getMessage(), 'error' => true, 'success' => false, 'types' => 'server']);
        }
    }
    public function validatePartido(Request $request)
    {
            $toufix    = DB::table('toufix')->where('toufixicode', $request->toufixicode)->first();
            if ($toufix->constascode == 1) {
                return response()->json(['message' => 'ESTE PARTIDO ESTA DISPONIBLE', 
                    'errors' =>"NO ERRORS", 'error' => false, 'success' => true, 'types' => 'constascode']);
             } else {
                    return response()->json(['message' => 'ESTE PARTIDO ESTA EN JUEGO O FINALIZADO', 
                        'errors' => "ERRORS", 'error' => true, 'success' => false, 'types' => 'constascode'],401);
                }
        
    }
    public function store_app(Request $request)
    {
        /*return $request->all();*/
        DB::beginTransaction();
        try {
            $toufix    = DB::table('toufix')->where('toufixicode', $request->toufixicode)->first();
            $validator = Validator::make($request->all(), [
                'toufixsscr2' => 'required|numeric|integer|min:0',
                'toufixsscr1' => 'required|numeric|integer|min:0',
            ])->setAttributeNames(['toufixsscr1' => 'tincazo Equipo 1', 'toufixsscr2' => 'tincazo Equipo 2']);
            if ($validator->passes()) {
                $date = Carbon::now();
                if ($toufix->constascode == 1) {
                    if ($request->plapreicode == null) {
                    
                        
                        $plapre              = new plapre;
                        $plapre->plapredcrea = $date->toDateString();
                        $plapre->plaprethour = $date->toTimeString();
                        $plapre->tougplicode = $request->tougplicode;
                        $plapre->toufixicode = $request->toufixicode;
                        $plapre->plapresscr1 = $request->toufixsscr1;
                        $plapre->plapresscr2 = $request->toufixsscr2;
                        $plapre->plapresxval = $request->tougrpsxval;
                        $plapre->plapresptos = 0;
                        $plapre->plaprebenbl = 1;
                        $plapre->save();
                        DB::commit();
                        return response()->json(
                            ['message' => 0, 'errors' => $validator->errors()->all(), 'error' => false, 'success' => true, 'types' => 'insert']);
                    } else {
                        $plapre = plapre::where('plapreicode', $request->plapreicode)
                            ->where('toufixicode', $request->toufixicode)
                            ->where('tougplicode', $request->tougplicode)
                            ->first();

                        if ($plapre) {
                            $plapre->plapresscr1 = $request->toufixsscr1;
                            $plapre->plapresscr2 = $request->toufixsscr2;
                            $plapre->plapredcrea = $date->toDateString();
                            $plapre->plaprethour = $date->toTimeString();
                            $plapre->save();
                            DB::commit();
                        } else {
                            return response()->json(
                                ['message' => 'Algo paso mal, intente de nuevo', 
                                'errors' => "", 'error' => true, 'success' => false, 'types' => 'update'],401);
                        }
                        return response()->json(
                            ['message' => 'Tincazo registrado correctamente', 'errors' => "", 'error' => false, 'success' => true, 'types' => 'update']);

                    }
                } else {
                    return response()->json(['message' => 'ESTE PARTIDO ESTA EN JUEGO O FINALIZADO', 'errors' => "", 'error' => true, 'success' => false, 'types' => 'constascode'],401);
                }
            } else {
                return response()->json(
                    ['message' => 'Algo paso mal, intente de nuevo', 'errors' => $validator->errors()->all(), 'error' => true, 'success' => false, 'types' => 'validate'],401);
            }
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(
                ['message' => 'Algo paso mal, intente de nuevo', 'errors' => "", 'error' => true, 'success' => false, 'types' => 'server'],401);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\plapre  $plapre
     * @return \Illuminate\Http\Response
     */
    public function show(plapre $plapre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\plapre  $plapre
     * @return \Illuminate\Http\Response
     */
    public function edit(plapre $plapre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\plapre  $plapre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, plapre $plapre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\plapre  $plapre
     * @return \Illuminate\Http\Response
     */
    public function destroy(plapre $plapre)
    {
        //
    }
}

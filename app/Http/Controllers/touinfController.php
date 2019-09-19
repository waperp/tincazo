<?php

namespace App\Http\Controllers;

use App\touadm;
use App\touinf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class touinfController extends Controller
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
    public function selectTournament(Request $request, $secconnuuid)
    {
        $touinf = touinf::where('secconnuuid', $secconnuuid)->first();
        if ($touinf) {
            Session::put('session_link_tournament', $touinf);
        } else {
            Session::forget('session_link_tournament');
        }
        return redirect()->route('home.index');
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
                if ($request->hasFile('touinfvlogt')) {

                    $imageName = str_random(30) . '.' . $request->file('touinfvlogt')->getClientOriginalExtension();
                    $request->file('touinfvlogt')->move(base_path() . '/public/images/', $imageName);
                } else {
                    $imageName = "default.jpg";
                }
                $touinf              = new touinf;
                $touinf->touinftname = $request->touinftname;
                $touinf->touinfdcrea = $date->toDateString();
                $touinf->touinfthour = $date->toTimeString();
                $touinf->touinfsnumt = $request->touinfsnumt;
                $touinf->touinfdstat = Carbon::parse($request->touinfdstat)->format('Y-m-d');
                $touinf->touinfdendt = Carbon::parse($request->touinfdendt)->format('Y-m-d');
                $touinf->touinfvlogt = $imageName;
                $touinf->touinfbenbl = 1;
                $touinf->save();
                $touadm = new touadm;
                $touadm->touinfscode = $touinf->touinfscode;
                $touadm->touadmbench = 1;
                $touadm->touadmbenpt = 1;
                $touadm->save();

            } else {
                if ($request->hasFile('touinfvlogt')) {

                    $imageName = str_random(30) . '.' . $request->file('touinfvlogt')->getClientOriginalExtension();
                    $request->file('touinfvlogt')->move(base_path() . '/public/images/', $imageName);
                } else {
                    $imageName = "null";
                }
                $touinf = touinf::find($request->touinfscode);

                $touinf->touinftname = $request->touinftname;
                $touinf->touinfsnumt = $request->touinfsnumt;
                $touinf->touinfdstat = Carbon::parse($request->touinfdstat)->format('Y-m-d');
                $touinf->touinfdendt = Carbon::parse($request->touinfdendt)->format('Y-m-d');
                $touinf->save();
                $touadm = new touadm;
                $touadm->touinfscode = $touinf->touinfscode;
                $touadm->touadmbench = 1;
                $touadm->touadmbenpt = 1;

                if ($imageName != "null") {
                    $touinf->touinfvlogt = $imageName;
                }
                $touadm->save();
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
     * @param  \App\touinf  $touinf
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $touinf              = touinf::find($id);
        $touinf->touinfdstat = Carbon::parse($touinf->touinfdstat)->format('d-m-Y');
        $touinf->touinfdendt = Carbon::parse($touinf->touinfdendt)->format('d-m-Y');
        return response()->json($touinf);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\touinf  $touinf
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\touinf  $touinf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, touinf $touinf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\touinf  $touinf
     * @return \Illuminate\Http\Response
     */
    public function destroy(touinf $touinf)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\touadm;
use Illuminate\Http\Request;

class touadmController extends Controller
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\touadm  $touadm
     * @return \Illuminate\Http\Response
     */
    public function show(touadm $touadm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\touadm  $touadm
     * @return \Illuminate\Http\Response
     */
    public function edit(touadm $touadm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\touadm  $touadm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $touinfscode)
    {
        // return $request->all();
        $touadm = touadm::where('touinfscode',$touinfscode)->first();
        $touadm->touadmbench = $request->touadmbench;
        $touadm->save();
        return response()->json('success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\touadm  $touadm
     * @return \Illuminate\Http\Response
     */
    public function destroy(touadm $touadm)
    {
        //
    }
}

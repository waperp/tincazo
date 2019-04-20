<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeUser;
use App\plainf;
use App\secusr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Session;

class secusrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response

    public function create()
    {
    return secusr::where('secusricode', 1)->first();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Responwse
     */
    public function editarPerfil()
    {
        $secusrtmail = Session::get('secusrtmails');
        $plainfvimgp = Session::get('plainfvimgps');
        $plainftname = Session::get('plainftnames');
        $secusrtface = Session::get('secusrtfaces');
        $plainftgder = Session::get('plainftgders');

        $secusrtface = Session::get('secusrtfaces');

        // return $plainftgder;
        return view('editarPerfil', compact('secusrtface', 'secusrtmail', 'plainfvimgp', 'plainftname', 'plainftgder', 'secusrtface'));
    }

    public function actualizarPerfil(Request $request)
    {
        DB::beginTransaction();
        try {
            $date = Carbon::now();
            if ($request->hasFile('plainfvimgp')) {

                $imageName = str_random(30) . '.' . $request->file('plainfvimgp')->getClientOriginalExtension();
                $request->file('plainfvimgp')->move(base_path() . '/public/', $imageName);
            } else {
                $imageName = "default.jpg";
            }
            $plainf = new plainf;

            $secusr              = new secusr;
            $plainf->plainftname = $request->plainftname;
            $plainf->plainfddobp = Carbon::parse($request->plainfddobp)->format('Y-m-d');
            $plainf->plainftnick = $request->plainftname;
            $plainf->plainfvimgp = $imageName;
            $plainf->plainfvimgp = $imageName;
            $plainf->conmemscode = $request->conmemscode;
            $plainf->save();

            $secusr->secusrtmail = $request->secusrtmail;
            $secusr->secusrtpass = $request->secusrtpass;
            $secusr->secusrdregu = $date->toDateString();
            $secusr->secusrdvalu = $date->toDateString();
            $secusr->contypscode = 2;
            $secusr->secusrbenbl = 1;
            $secusr->secusrtface = $request->secusrtface;
            $secusr->plainficode = $plainf->plainficode;
            $secusr->save();

            Session::put('secusrtmail', $secusr->secusrtmail);
            Session::put('secusricode', $secusr->secusricode);
            Session::put('plainficode', $plainf->plainficode);
            Session::put('contypscode', $secusr->contypscode);
            Session::put('plainftnick', $plainf->plainftnick);

            DB::commit();
            return response()->json($secusr);
        } catch (\Exception $e) {

            DB::rollback();
            return response()->json($e);
        }
    }
    public function store(Request $request)
    {
        // return response()->json($request->all());

        DB::beginTransaction();
        try {
            $date = Carbon::now();

            // return response()->json(!$existMail);
            if ($request->tipo == 0) {
                $existMail = DB::table('secusr')->where('secusrtmail', $request->secusrtmail)->first();
                if (!$existMail) {
                    if ($request->hasFile('plainfvimgp')) {

                        $imageName = str_random(30) . '.' . $request->file('plainfvimgp')->getClientOriginalExtension();
                        $request->file('plainfvimgp')->move(base_path() . '/public/images/', $imageName);
                    } else {
                        if ($request->plainftgder == "M") {
                            $imageName = "defaultm.jpg";

                        } else {
                            $imageName = "defaultf.jpg";

                        }
                    }
                    $plainf              = new plainf;
                    $secusr              = new secusr;
                    $plainf->plainftname = $request->plainftname;
                    $plainf->plainfddobp = Carbon::parse($request->plainfddobp)->format('Y-m-d');
                    $plainf->plainftnick = $request->plainftname;
                    $plainf->plainfvimgp = $imageName;
                    $plainf->conmemscode = $request->conmemscode;
                    $plainf->plainftgder = $request->plainftgder;
                    $plainf->save();
                    $secusr->secusrtmail = $request->secusrtmail;
                    $secusr->secusrtpass = $request->secusrtpass;
                    $secusr->secusrdregu = $date->toDateString();
                    $secusr->secusrdvalu = $date->toDateString();
                    $secusr->contypscode = 2;
                    $secusr->secusrbenbl = 1;
                    $secusr->plainficode = $plainf->plainficode;
                    $secusr->save();
                    $conmem = DB::table('conmem')->where('conmemscode', $plainf->conmemscode)->first();

                    Session::put('secusrtmail', $secusr->secusrtmail);
                    Session::put('secusricode', $secusr->secusricode);
                    Session::put('contypscode', $secusr->contypscode);
                    Session::put('plainficode', $plainf->plainficode);
                    Session::put('plainftnick', $plainf->plainftnick);
                    Session::put('conmemscode', $plainf->conmemscode);
                    Session::put('conmemvimgm', $conmem->conmemvimgm);
                    Mail::to($secusr->secusrtmail)->send(new WelcomeUser($plainf));
                    DB::commit();
                    return response()->json(['success' => true, 'mail' => false, 'type' => 'create']);

                } else {
                    return response()->json(['success' => false, 'mail' => true, 'type' => 'validate']);
                }

            } else if ($request->tipo == 1) {
                $plainf = plainf::find(Session::get('plainficode'));
                $secusr = secusr::find(Session::get('secusricode'));

                if ($request->hasFile('plainfvimgp')) {
                    $imageNames = str_random(30) . '.' . $request->file('plainfvimgp')->getClientOriginalExtension();
                    $request->file('plainfvimgp')->move(base_path() . '/public/images/', $imageNames);
                } else {
                    $imageNames = "null";
                }

                $plainf->plainfddobp = Carbon::parse($request->plainfddobp)->format('Y-m-d');
                $plainf->plainftnick = $request->plainftnick;
                if ($imageNames != "null") {
                    $plainf->plainfvimgp = $imageNames;
                }
                $plainf->plainftgder = $request->plainftgder;
                $plainf->save();

                if ($request->secusrtpass != null) {
                    $secusr->secusrtpass = $request->secusrtpass;
                }

                $secusr->save();
                DB::commit();
                return response()->json(['success' => true, 'mail' => false, 'type' => 'update']);
            } else {
                return response()->json(['success' => false, 'mail' => false, 'type' => 'error']);
            }

        } catch (\Exception $e) {

            DB::rollback();
            return response()->json($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\secusr  $secusr
     * @return \Illuminate\Http\Response
     */
    public function show(secusr $secusr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\secusr  $secusr
     * @return \Illuminate\Http\Response
     */
    public function edit(secusr $secusr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\secusr  $secusr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, secusr $secusr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\secusr  $secusr
     * @return \Illuminate\Http\Response
     */
    public function destroy(secusr $secusr)
    {
        //
    }
}
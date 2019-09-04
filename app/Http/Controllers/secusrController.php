<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeUser;
use Webpatser\Uuid\Uuid;
use App\plainf;
use App\secusr;
use App\tougpl;
use Illuminate\Support\Facades\Crypt;
use App\tougrp;
use App\touinf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Session;

class secusrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { }
    public function userInvitation(Request $request, $tougrp_secconnuuid, $secusr_secconnuuid)
    {
        // $secusr = secusr::all();
        // foreach ($secusr as $key) {
        //    $key->secconnuuid = Uuid::generate(4)->string;
        //    $key->save();
        // }
        DB::beginTransaction();
        try {
            $secusrtmail = Crypt::decryptString($secusr_secconnuuid);
            $tougrp = tougrp::where('secconnuuid', $tougrp_secconnuuid)->first();
            $secusr = secusr::where('secusrtmail', $secusrtmail)
                ->join('plainf', 'secusr.plainficode', 'plainf.plainficode')
                ->first();
            if ($secusr && $tougrp) {

                $userInGroup = tougpl::where('constascode', 2)->where('tougrpicode', $tougrp->tougrpicode)
                    ->where('plainficode', $secusr->plainficode)->first();
                if (!$userInGroup) {
                    $touinf = touinf::where('touinfscode', $tougrp->touinfscode)->first();
                    $tougpl              = new tougpl;
                    $tougpl->tougrpicode = $tougrp->tougrpicode;
                    $tougpl->constascode = 2;
                    $tougpl->plainficode = $secusr->plainficode;
                    $tougpl->tougplipwin = 0;
                    $tougpl->tougplsmaxp = 0;
                    $tougpl->tougplsmedp = 0;
                    $tougpl->tougplslowp = 0;
                    $tougpl->save();

                    $tougrp_select = tougrp::join('tougpl', 'tougpl.tougrpicode', 'tougrp.tougrpicode')
                        ->where('tougrp.secconnuuid', $tougrp_secconnuuid)
                        ->where('tougpl.tougplicode', $tougpl->tougplicode)
                        ->first();
                    Session::put('session_selected_tougrp', $tougrp_select);
                    Session::put('tougrp', $tougrp_select);
                    Session::put('touinf', $touinf);
                    if ($touinf) {
                        Session::put('session_link_tournament', $touinf);
                    } else {
                        Session::forget('session_link_tournament');
                    }
                    Session::put('select-tougrptname', $tougrp_select->tougrptname);
                    Session::put('select-q', true);
                    Session::put('select-tougrpicode', $tougrp_select->tougrpicode);
                    Session::put('select-touinfscode', $tougrp_select->touinfscode);
                    Session::put('select-tougplicode', $tougrp_select->tougplicode);
                    Session::put('select-plainficode', $tougrp_select->plainficode);
                    Session::put('select-tougrpsxval', $tougrp_select->tougrpsxval);
                    Session::put('select-tougrpschpt', $tougrp_select->tougrpschpt);
                    $conmem = DB::table('conmem')->where('conmemscode', $secusr->conmemscode)->first();
                    Session::put('secusrtmail', $secusr->secusrtmail);
                    Session::put('secusricode', $secusr->secusricode);
                    Session::put('plainficode', $secusr->plainficode);
                    Session::put('contypscode', $secusr->contypscode);
                    Session::put('plainftnick', $secusr->plainftnick);
                    Session::put('conmemscode', $conmem->conmemscode);
                    Session::put('conmemvimgm', $conmem->conmemvimgm);
                    secusr::where('secusrtmail', $secusr->secusrtmail)
                        ->join('plainf', 'secusr.plainficode', 'plainf.plainficode')
                        ->where('plainf.plainfbteco', 0)->update(['plainfbteco' => 1]);
                    if (Session::get('plainficode') == Session::get('select-plainficode')) {
                        Session::put('session-admin-tougrp', true);
                    } else {
                        Session::put('session-admin-tougrp', false);
                    }
                    \Auth::loginUsingId($secusr->secusricode);
                    DB::commit();
                    return redirect('/');
                } else {
                    return 'USUARIO YA EXISTE EN EL GRUPO';
                }
            } else if (!$secusr && $tougrp) {

                return view('partials.login.login_invite_user', compact('secusrtmail', 'tougrp'));
            } else {
                return 'NO EXISTE EL GRUPO';
            }
        } catch (\Exception $e) {
            DB::rollback();
            abort(401, 'NO AUTORIZADO');
        }
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
    public function username()
    {
        return 'secusrtmail';
    }
    public function userpassword()
    {
        return 'password';
    }
    public function updatePerfilApi(Request $request)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'plainftnick' => 'required|string',
                'plainftgder'    => 'required|string',
                'plainfddobp'    => 'required|string',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'message' => $validator->errors()->all(),
                ], 401);
            } else {
                $plainf = plainf::find($request->user()->plainficode);
                $secusr = secusr::find($request->user()->secusricode);
                $plainf->plainfddobp = Carbon::parse($request->plainfddobp)->format('Y-m-d');
                $plainf->plainftnick = $request->plainftnick;
                $plainf->plainftgder = $request->plainftgder;
                if ($request->secusrtpass != null) {
                    $secusr->secusrtpass = Hash::make($request->secusrtpass);
                }
                $plainf->save();
                $secusr->save();
                DB::commit();
            }
            return response()->json(['success' => true, 'mail' => false, 'type' => 'update']);
        } catch (\Exception $e) {

            DB::rollback();
            return response()->json($e->getMessage());
        }
    }

    public function validateMailLogin(Request $request)
    {
        $secusr = secusr::where('secusrtmail', $request->secusrtmail)
            ->join('plainf', 'secusr.plainficode', 'plainf.plainficode')->first();
        $isTermsConditions = secusr::where('secusrtmail', $request->secusrtmail)
            ->join('plainf', 'secusr.plainficode', 'plainf.plainficode')
            ->where('plainf.plainfbteco', 0)->first();
        if ($secusr && $isTermsConditions) {
            return response()->json(['isTermsConditions' => true, 'isValidMail' => true, 'message' => 'existe usuario']);
        } else if ($secusr && !$isTermsConditions) {
            return response()->json(['isTermsConditions' => false, 'isValidMail' => true, 'message' => 'no existe usuario']);
        } else if (!$secusr && $isTermsConditions) {
            return response()->json(['isTermsConditions' => true, 'isValidMail' => false, 'message' => 'no existe usuario']);
        } else if (!$secusr && !$isTermsConditions) {
            return response()->json(['isTermsConditions' => false, 'isValidMail' => false, 'message' => 'no existe usuario']);
        }
    }
    public function validateMailInvite(Request $request)
    {
        $secusr = secusr::where('secusrtmail', $request->secusrtmail)
            ->join('plainf', 'secusr.plainficode', 'plainf.plainficode')->first();

        if ($secusr) {
            return response()->json(['isValidMail' => true, 'message' => 'existe usuario', 'data' => $secusr]);
        } else {
            return response()->json(['isValidMail' => false, 'message' => 'no existe usuario', 'data' => $secusr]);
        }
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $date = Carbon::now();

            if ($request->tipo == 0) {

                $validator = Validator::make($request->all(), [
                    'plainftname' => 'required|string',
                    'secusrtmail' => 'required|string|email',
                    'password'    => 'required|string',
                    'conmemscode' => 'required',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'message' => $validator->errors()->all(),
                    ], 401);
                } else {
                    $existMail = DB::table('secusr')->where('secusrtmail', $request->secusrtmail)->first();
                    if (!$existMail) {
                        if ($request->hasFile('plainfvimgp')) {

                            $imageName = str_random(30) . '.' . $request->file('plainfvimgp')->getClientOriginalExtension();
                            $request->file('plainfvimgp')->move(base_path() . '/public/images/', $imageName);
                        } else {
                            $imageName = "user.png";
                        }
                        $plainfddobp = "";
                        if ($request->plainfddobp) {
                            $plainfddobp = Carbon::parse($request->plainfddobp)->format('Y-m-d');
                        } else {
                            $plainfddobp = Carbon::now()->format('Y-m-d');
                        }
                        $plainf              = new plainf;
                        $secusr              = new secusr;
                        $plainf->plainftname = $request->plainftname;
                        $plainf->plainfddobp =  $plainfddobp;
                        $plainf->plainftnick = $request->plainftname;
                        $plainf->plainfvimgp = $imageName;
                        $plainf->plainfbteco = 1;
                        $plainf->conmemscode = $request->conmemscode;
                        $plainf->plainftgder = $request->plainftgder == '' ? 'M' : $request->plainftgder;
                        $plainf->save();
                        $secusr->secusrtmail = $request->secusrtmail;
                        $secusr->secusrtpass = Hash::make($request->password);
                        $secusr->secusrdregu = $date->toDateString();
                        $secusr->secusrdvalu = $date->toDateString();
                        $secusr->contypscode = 2;
                        $secusr->secusrbenbl = 1;
                        $secusr->plainficode = $plainf->plainficode;
                        $secusr->save();
                        $conmem      = DB::table('conmem')->where('conmemscode', $plainf->conmemscode)->first();
                        $credentials = $request->only($this->username(), $this->userpassword());
                        if (!Auth::attempt($credentials)) {
                            return response()->json(['success' => false, 'mail' => true, 'type' => 'validate']);
                        } else {
                            Session::put('secusrtmail', $secusr->secusrtmail);
                            Session::put('secusricode', $secusr->secusricode);
                            Session::put('contypscode', $secusr->contypscode);
                            Session::put('plainficode', $plainf->plainficode);
                            Session::put('plainftnick', $plainf->plainftnick);
                            Session::put('conmemscode', $plainf->conmemscode);
                            Session::put('conmemvimgm', $conmem->conmemvimgm);
                            // Mail::to($secusr->secusrtmail)->send(new WelcomeUser($plainf));
                            DB::commit();
                            return response()->json([
                                'success' => true, 'mail'      => false, 'type' => 'create',
                                'plainf'                           => $plainf, 'conmem' => $conmem
                            ]);
                        }
                    } else {
                        return response()->json(['success' => false, 'mail' => true, 'type' => 'validate']);
                    }
                }
            } else if ($request->tipo == 1) {
                $validator = Validator::make($request->all(), [
                    'plainftname' => 'required|string',
                    'secusrtmail' => 'required|string|email',
                    'password'    => 'required|string',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'message' => $validator->errors()->all(),
                    ], 401);
                } else {
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
                    $plainf->plainfbteco = 1;

                    if ($imageNames != "null") {
                        $plainf->plainfvimgp = $imageNames;
                    }
                    $plainf->plainftgder = $request->plainftgder;
                    $plainf->save();

                    if ($request->password != null) {
                        $secusr->secusrtpass = Hash::make($request->password);
                    }

                    $secusr->save();
                    DB::commit();
                }

                return response()->json(['success' => true, 'mail' => false, 'type' => 'update']);
            } else if ($request->tipo == 2) {
                $validator = Validator::make($request->all(), [
                    'plainftname' => 'required|string',
                    'secusrtmail' => 'required|string|email',
                    'password'    => 'required|string',
                    'conmemscode' => 'required',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'message' => $validator->errors()->all(),
                    ], 401);
                } else {
                    $existMail = DB::table('secusr')->where('secusrtmail', $request->secusrtmail)->first();
                    if (!$existMail) {
                        if ($request->hasFile('plainfvimgp')) {

                            $imageName = str_random(30) . '.' . $request->file('plainfvimgp')->getClientOriginalExtension();
                            $request->file('plainfvimgp')->move(base_path() . '/public/images/', $imageName);
                        } else {
                            $imageName = "user.png";
                        }
                        $plainfddobp = "";
                        if ($request->plainfddobp) {
                            $plainfddobp = Carbon::parse($request->plainfddobp)->format('Y-m-d');
                        } else {
                            $plainfddobp = Carbon::now()->format('Y-m-d');
                        }
                        $plainf              = new plainf;
                        $secusr              = new secusr;
                        $plainf->plainftname = $request->plainftname;
                        $plainf->plainfddobp =  $plainfddobp;
                        $plainf->plainftnick = $request->plainftname;
                        $plainf->plainfvimgp = $imageName;
                        $plainf->plainfbteco = 1;
                        $plainf->conmemscode = $request->conmemscode;
                        $plainf->plainftgder = $request->plainftgder == '' ? 'M' : $request->plainftgder;
                        $plainf->save();
                        $secusr->secusrtmail = $request->secusrtmail;
                        $secusr->secusrtpass = Hash::make($request->password);
                        $secusr->secusrdregu = $date->toDateString();
                        $secusr->secusrdvalu = $date->toDateString();
                        $secusr->contypscode = 2;
                        $secusr->secusrbenbl = 1;
                        $secusr->plainficode = $plainf->plainficode;
                        $secusr->save();
                        $tougrp = tougrp::where('secconnuuid', $request->secconnuuid)->first();
                        $conmem = DB::table('conmem')->where('conmemscode', $request->conmemscode)->first();
                        $credentials = $request->only($this->username(), $this->userpassword());
                        $touinf = touinf::where('touinfscode', $tougrp->touinfscode)->first();
                        $tougpl              = new tougpl;
                        $tougpl->tougrpicode = $tougrp->tougrpicode;
                        $tougpl->constascode = 2;
                        $tougpl->plainficode = $secusr->plainficode;
                        $tougpl->tougplipwin = 0;
                        $tougpl->tougplsmaxp = 0;
                        $tougpl->tougplsmedp = 0;
                        $tougpl->tougplslowp = 0;
                        $tougpl->save();

                        $tougrp_select = tougrp::join('tougpl', 'tougpl.tougrpicode', 'tougrp.tougrpicode')
                            ->where('tougrp.secconnuuid', $tougrp->secconnuuid)
                            ->where('tougpl.tougplicode', $tougpl->tougplicode)
                            ->first();
                        Session::put('session_selected_tougrp', $tougrp_select);
                        Session::put('tougrp', $tougrp_select);
                        Session::put('touinf', $touinf);
                        if ($touinf) {
                            Session::put('session_link_tournament', $touinf);
                        } else {
                            Session::forget('session_link_tournament');
                        }
                        Session::put('select-tougrptname', $tougrp_select->tougrptname);
                        Session::put('select-q', true);
                        Session::put('select-tougrpicode', $tougrp_select->tougrpicode);
                        Session::put('select-touinfscode', $tougrp_select->touinfscode);
                        Session::put('select-tougplicode', $tougrp_select->tougplicode);
                        Session::put('select-plainficode', $tougrp_select->plainficode);
                        Session::put('select-tougrpsxval', $tougrp_select->tougrpsxval);
                        Session::put('select-tougrpschpt', $tougrp_select->tougrpschpt);
                        Session::put('secusrtmail', $secusr->secusrtmail);
                        Session::put('secusricode', $secusr->secusricode);
                        Session::put('plainficode', $secusr->plainficode);
                        Session::put('contypscode', $secusr->contypscode);
                        Session::put('plainftnick', $secusr->plainftnick);
                        Session::put('conmemscode', $conmem->conmemscode);
                        Session::put('conmemvimgm', $conmem->conmemvimgm);
                        secusr::where('secusrtmail', $secusr->secusrtmail)
                            ->join('plainf', 'secusr.plainficode', 'plainf.plainficode')
                            ->where('plainf.plainfbteco', 0)->update(['plainfbteco' => 1]);
                        if (Session::get('plainficode') == Session::get('select-plainficode')) {
                            Session::put('session-admin-tougrp', true);
                        } else {
                            Session::put('session-admin-tougrp', false);
                        }
                        // \Auth::loginUsingId($secusr->secusricode);
                        if (!Auth::attempt($credentials)) {
                            return response()->json(['success' => false, 'mail' => true, 'type' => 'validate']);
                        } else {
                            Session::put('secusrtmail', $secusr->secusrtmail);
                            Session::put('secusricode', $secusr->secusricode);
                            Session::put('contypscode', $secusr->contypscode);
                            Session::put('plainficode', $plainf->plainficode);
                            Session::put('plainftnick', $plainf->plainftnick);
                            Session::put('conmemscode', $plainf->conmemscode);
                            Session::put('conmemvimgm', $conmem->conmemvimgm);
                            // Mail::to($secusr->secusrtmail)->send(new WelcomeUser($plainf));
                            DB::commit();
                            return response()->json([
                                'success' => true, 'mail'      => false, 'type' => 'create',
                                'plainf'                           => $plainf, 'conmem' => $conmem
                            ]);
                        }
                    } else {
                        return response()->json(['success' => false, 'mail' => true, 'type' => 'validate']);
                    }
                }
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

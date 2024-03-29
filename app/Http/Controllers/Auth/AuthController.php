<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\sendPinMail;
use App\Mail\sendValidateMail;
use App\plainf;
use App\secpin;
use App\secusr;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username()     => 'required|string',
            $this->userpassword() => 'required|string',
        ]);
    }
    public function username()
    {
        return 'secusrtmail';
    }
    public function userpassword()
    {
        return 'password';
    }
    public function up()
    {
        /* $Secusr1              = secusr::where('secusricode', 1)->first();
        $Secusr1->secusrtpass = Hash::make('Tincazo.com123.');
        $Secusr1->save();*/
        /*return secusr::paginate(10);*/
        return Hash::make('Tincazo.com123.');

    }
    public function tableGroupInvitations(Request $request)
    {
        /* $data = DB::select('SELECT plainf.plainficode, plainf.plainfvimgp, plainf.plainftname, plainf.plainftnick, secusr.secusrtmail,
(SELECT tougpl.constascode FROM tougpl WHERE tougpl.tougrpicode = 56 AND tougpl.plainficode = plainf.plainficode) AS constascode  
FROM `plainf` 
INNER JOIN `secusr` ON `plainf`.`plainficode` = `secusr`.`plainficode` 
WHERE `secusr`.`secusrbenbl` = 1 AND (MATCH (secusr.secusrtmail) 
AGAINST ('"nocialu_matador@hotmail*"' IN BOOLEAN MODE) OR MATCH (plainf.plainftname) AGAINST ('"nocialu_matador@hotmail*"' IN BOOLEAN MODE) ) ORDER BY `plainf`.`plainftnick` ASC');
       */

        $data = secusr::selectRaw('plainf.plainficode, plainf.plainfvimgp, plainf.plainftname, plainf.plainftnick, secusr.secusrtmail,(Select tougpl.constascode from tougpl where tougpl.tougrpicode = ? and tougpl.plainficode =
            plainf.plainficode) as constascode  ', [$request->tougrpicode])
            ->join('plainf', 'plainf.plainficode', 'secusr.plainficode')
            ->where('secusr.secusrbenbl', 1)
            ->whereRaw("(secusr.secusrtmail LIKE ? OR plainf.plainftname LIKE ?)",[$request->secusrtmail."%",$request->secusrtmail."%"])
            // ->orWhereRaw('MATCH (plainf.plainftname) AGAINST ("?" IN BOOLEAN MODE)', $request->secusrtmail."*")
            ->orderBy('plainf.plainftnick')
            ->take(20)->get();
        return response()->json($data);

    }
    public function sendPinMailApi(Request $request)
    {

        $secpin              = new secpin;
        $secpin->secpininump = mt_rand(10000, 99999);
        $secpin->secusricode = $request->secusricode;
        $secpin->secusrtmail = $request->secusrtmail;
        $secpin->save();

        Mail::to($request->secusrtmail)->send(new sendPinMail($secpin));
        return response()->json($secpin);

    }
    public function updateResetPasswordApi(Request $request)
    {
        if ($request->has('password') && $request->has('password')) {
            try {
                $existMail = secpin::where('secusrtmail', $request->secusrtmail)
                    ->where('secpin.secpininump', $request->secpininump)
                    ->where('secpin.secusricode', $request->secusricode)->first();
                if ($existMail) {
                    $secusr              = secusr::where('secusrtmail', $request->secusrtmail)->first();
                    $secusr->secusrtpass = Hash::make($request->password);
                    $secusr->save();
                    $plainf = plainf::find($secusr->plainficode);
                    $conmem = DB::table('conmem')->where('conmemscode', $plainf->conmemscode)->first();
                    return response()->json([
                        'error' => false,
                        'message' => 'Se hace cambiado Correcamente su contraseña',
                        'secusr'       => $secusr,
                        'plainf'       => $plainf,
                        'conmem'       => $conmem,
                    ], 200);

                } else {
                    return response()->json(['error' => true, 'message' => 'El PIN ingresado no coincide, intente con otro PIN'],401);
                }
            } catch (DecryptException $e) {
                return response()->json(['error' => true, 'message' => 'Estas credenciales no coinciden con nuestros registros'],401);
            }

        } else {
            return response()->json(['error' => true, 'message' =>  'Estas credenciales no coinciden con nuestros registros'],401);
        }

    }
    public function validateMailApi(Request $request)
    {
        if ($request->has('secusrtmail') || $request->secusrtmail != null) {
            $existMail = DB::table('secusr')
                ->join('plainf', 'plainf.plainficode', 'secusr.plainficode')
                ->join('conmem', 'plainf.conmemscode', 'conmem.conmemscode')
                ->where('secusrtmail', $request->secusrtmail)->first();
            if ($existMail) {
                return response()->json(['secusr' => $existMail, 'mail' => true]);
            }
            return response()->json(['secusr' => $existMail, 'mail' => false]);
        } else {
            return response()->json(['mail' => null]);
        }
    }
    public function sendValidateMailApi(Request $request)
    {

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
    public function myChampion(Request $request)
    {
        /*$data = DB::select('select toutte.touttescode as touttescode1, toutea.touteavimgt, toutea.touteatname, plachm.touttescode
        from toutea
        join toutte on toutea.touteascode = toutte.touteascode
        join tougrp on toutte.touinfscode = tougrp.touinfscode
        join tougpl on tougrp.tougrpicode = tougpl.tougrpicode
        left join plachm on toutte.touttescode = plachm.touttescode and plachm.tougplicode = ?
        where tougrp.tougrpicode = ? and tougpl.tougplicode = ? order by touteatname asc',
        [$request->tougplicode, $request->tougrpicode, $request->tougplicode]);*/
        $data = DB::table('toutea')
            ->select('toutte.touttescode as touttescode1', 'toutea.touteavimgt', 'toutea.touteatname', 'plachm.touttescode')
            ->join('toutte', 'toutea.touteascode', 'toutte.touteascode')
            ->join('tougrp', 'toutte.touinfscode', 'tougrp.touinfscode')
            ->join('tougpl', 'tougrp.tougrpicode', 'tougpl.tougrpicode')
            ->leftJoin('plachm', function ($consta) use ($request) {
                $consta->on('toutte.touttescode', 'plachm.touttescode')
                    ->where('plachm.tougplicode', $request->tougplicode);
            })
            ->where('tougrp.tougrpicode', $request->tougrpicode)
            ->where('tougpl.tougplicode', $request->tougplicode)
            ->orderBy('toutea.touteatname', 'desc')->paginate(20);
        return response()->json($data);
    }
    public function myChampionTeams(Request $request)
    {
        /*$data = DB::select('select toutte.touttescode as touttescode1, toutea.touteavimgt, toutea.touteatname, plachm.touttescode
        from toutea
        join toutte on toutea.touteascode = toutte.touteascode
        join tougrp on toutte.touinfscode = tougrp.touinfscode
        join tougpl on tougrp.tougrpicode = tougpl.tougrpicode
        left join plachm on toutte.touttescode = plachm.touttescode and plachm.tougplicode = ?
        where tougrp.tougrpicode = ? and tougpl.tougplicode = ? order by touteatname asc',
        [$request->tougplicode, $request->tougrpicode, $request->tougplicode]);*/
        $data = DB::table('toutea')
            ->select('toutte.touttescode as touttescode1', 'toutea.touteavimgt', 'toutea.touteatname', 'plachm.touttescode')
            ->join('toutte', 'toutea.touteascode', 'toutte.touteascode')
            ->join('tougrp', 'toutte.touinfscode', 'tougrp.touinfscode')
            ->join('tougpl', 'tougrp.tougrpicode', 'tougpl.tougrpicode')
            ->Join('plachm', function ($consta) use ($request) {
                $consta->on('toutte.touttescode', 'plachm.touttescode')
                    ->where('plachm.tougplicode', $request->tougplicode);
            })
            ->where('tougrp.tougrpicode', $request->tougrpicode)
            ->where('tougpl.tougplicode', $request->tougplicode)
            ->orderBy('toutea.touteatname', 'desc')->first();
        return response()->json($data);
    }
    public function login(Request $request)
    {
        $request->validate([
            'secusrtmail' => 'required|string|email',
            'password'    => 'required|string',
            //'remember_me' => 'boolean'
        ]);
        $credentials = $request->only($this->username(), $this->userpassword());
        /*$credentials = Hash::check($request->password,'$2y$10$tlt27o944Y1nW3WO04NCAumz.eVztscyl4xTCkyUlKdVh4XqxhgUi');*/
        /*   return response()->json([
        'message ss' => $credentials ,
        ],401);*/
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        } else {
            $user        = $request->user();
            $tokenResult = $user->createToken('tincazo');
            $token       = $tokenResult->token;
            if ($request->remember_me) {
                $token->expires_at = Carbon::now()->addWeeks(1);
            }

            $token->save();
            $plainf = plainf::find($user->plainficode);
            $conmem = DB::table('conmem')->where('conmemscode', $plainf->conmemscode)->first();
            secusr::where('secusrtmail', $request->secusrtmail)->join('plainf', 'secusr.plainficode', 'plainf.plainficode')
                            ->where('plainf.plainfbteco', 0)->update(['plainfbteco' => 1]);
            return response()->json([
                'access_token' => $tokenResult->accessToken,
                'token_type'   => 'Bearer',
                'plainf'       => $plainf,
                'conmem'       => $conmem,
                'expires_at'   => Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString(),
            ], 200);
        }

    }
    public function membership(Request $request)
    {

        $data = DB::table('conmem')->where('conmem.conmemscode', 2)->get();
        return response()->json($data);
    }
    public function tournament(Request $request)
    {

        $data = DB::table('touinf')->select('touinf.*')
            ->join('tougrp', 'touinf.touinfscode', 'tougrp.touinfscode')
            ->join('tougpl', 'tougrp.tougrpicode', 'tougpl.tougrpicode')
            ->where('tougpl.plainficode', $request->user()->plainficode)->distinct('touinf.touinfscode')->get();

        return response()->json($data);
    }
public function tournamentDay(Request $request)
    {

        $data =  DB::table('touinf')->where('touinfdendt','>',Carbon::now()->toDateString())->get();

        return response()->json($data);
    }
    public function groups(Request $request)
    {

        $data = DB::select('select tougrp.*,touinf.*, tougpl.tougplicode
        from tougrp
        join touinf on tougrp.touinfscode = touinf.touinfscode
        join tougpl on tougrp.tougrpicode = tougpl.tougrpicode
        where tougrp.tougrpbenbl = 1 and tougpl.plainficode = ? and tougpl.constascode = 2 and touinf.touinfscode = ?',
            [\Auth::user()->plainficode, $request->touinfscode]);

        return response()->json($data);
    }
     public function isAdminGroup(Request $request)
    {

        $data = DB::table('tougrp')
        ->select(DB::raw('COUNT(tougrp.plainficode) as isAdmin'))
        ->where('tougrp.plainficode',$request->user()->plainficode)
        ->where('tougrp.tougrpicode',$request->tougrpicode)
        ->first();


        return response()->json($data->isAdmin);
    }
    public function tablePositionsGeneral(Request $request)
    {

        /*  $data = DB::select('Select RANK() OVER (Order By tougpl.tougplipwin desc) as POS, plainf.plainficode , plainf.plainfvimgp, plainf.plainftnick JUGADOR,
        tougpl.tougplsmaxp TA, tougpl.tougplsmedp TM, tougpl.tougplslowp TB, tougpl.tougplipwin PTOS
        from tougpl join plainf on tougpl.plainficode = plainf.plainficode
        where tougpl.tougrpicode = ? and tougpl.constascode = 2 order by tougpl.tougplipwin desc, plainf.plainftnick asc',
        [Session::get('select-tougrpicode')]);
         */
        $data = DB::table('tougpl')->select(\DB::raw('RANK() OVER (Order By tougpl.tougplipwin desc) as POS'),
            'plainf.plainficode', 'plainf.plainfvimgp', 'plainf.plainftnick as JUGADOR', 'tougpl.tougplsmaxp as TA',
            'tougpl.tougplsmedp as TM', 'tougpl.tougplslowp as TB', 'tougpl.tougplipwin as TINCAZOS','tougpl.tougplschpt as CAMPEON',DB::raw('tougpl.tougplipwin + tougpl.tougplschpt as PTOS'))
            ->join('plainf', 'tougpl.plainficode', 'plainf.plainficode')
            ->where('tougpl.tougrpicode', $request->tougrpicode)
            ->where('tougpl.constascode', 2)
            ->orderBy('tougpl.tougplipwin', 'desc')
            ->orderBy('plainf.plainftnick', 'asc')
            ->paginate(100);

        return response()->json($data);
    }
    public function validateTournamentApi(Request $request)
    {
        $date = Carbon::now();
        $data = DB::table('touinf')->select(DB::raw('count(touinf.touinfscode) as fecha'))
            ->where('touinf.touinfscode', $request->touinfscode)
            ->where('touinf.touinfdstat', '>', $date->toDateString())
            ->first();
        return response()->json($data->fecha);

    }
    public function getPositionsGeneralInfoUser(Request $request)
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
            [$request->plainficode, $request->tougrpicode]);
            return response()->json($data);
    }
    public function getPositionsGeneralInfoUserDay(Request $request)
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
            [$request->plainficode, $request->tougrpicode,$request->toufixdplay]);
            return response()->json($data);
    }
    public function getUsersToChampions(Request $request)
    {
        $data = DB::select('Select plainf.plainfvimgp, plainf.plainftnick from plachm join tougpl on plachm.tougplicode = tougpl.tougplicode
        join plainf on tougpl.plainficode = plainf.plainficode where tougpl.tougrpicode = ? and plachm.touttescode = ?',
         [$request->tougrpicode, $request->touttescode]);
        return response()->json($data);
    }
    public function getChampionsUsers(Request $request)
    {
        $data = DB::select('Select toutte.touttebenbl, toutea.touteavimgt, toutte.touttescode,toutea.touteatname, count(tougpl.tougplicode) as cantidad from toutea
            join toutte on toutea.touteascode = toutte.touteascode
join plachm on toutte.touttescode = plachm.touttescode join tougpl on plachm.tougplicode = tougpl.tougplicode where tougpl.tougrpicode = ?
group by  toutte.touttescode ,toutea.touteavimgt, toutea.touteatname, toutte.touttebenbl', [$request->tougrpicode]);
        return response()->json($data);

    }
    public function tablePositionsDay(Request $request)
    {
        $date = Carbon::now();
        $data = DB::table('plapre')->select('plainf.plainficode','plainf.plainfvimgp', 'plainf.plainftnick as JUGADOR', 
            DB::raw('SUM(plapre.plapresptos) AS PTOS'))
            ->join('toufix', 'plapre.toufixicode', 'toufix.toufixicode')
            ->join('tougpl', 'plapre.tougplicode', 'tougpl.tougplicode')
            ->join('plainf', 'tougpl.plainficode', 'plainf.plainficode')
            ->where('toufix.toufixdplay', Carbon::parse($request->toufixdplay)->format('Y-m-d'))
            ->where('tougpl.tougrpicode', $request->tougrpicode)
            ->where('toufix.constascode', 3)
            ->groupBy('plainf.plainficode', 'plainf.plainfvimgp', 'plainf.plainftnick')
            ->orderBy('PTOS', 'desc')
            ->orderBy('plainf.plainftnick', 'asc')
            ->paginate(100);
        return response()->json($data);

    }
    public function register(Request $request)
    {

        $validator = $request->validate([
            'fName'    => 'required|string',
            'lName'    => 'required|string',
            'email'    => 'required|string|email|unique:users',
            'password' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Failed created user!',
            ], 400);
        } else {
            DB::beginTransaction();
            try {
                $user             = new secusr;
                $user->first_name = $request->fName;
                $user->last_name  = $request->lName;
                $user->email      = $request->email;
                $user->password   = bcrypt($request->password);

                $user->save();

                return response()->json([
                    'message' => 'Successfully created user!',
                ], 201);
            } catch (\Exception $e) {

                DB::rollback();
                return response()->json($e);
            }
        }
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Se desconectó con éxito',
        ]);
    }
    public function pendingMatches(Request $request)
    {

        $data = DB::table('toufix')->select('toufix.toufixicode', 'toutea1.touteavimgt', 'toutea1.touteatname',
            'toutea1.touteatname',
            'toufix.toufixsscr1', 'toufix.toufixspen1', 'toutea2.touteavimgt AS touteavimgt2',
            'toutea2.touteatname AS touteatname2', 'toufix.toufixsscr2',
            'toufix.toufixspen2', 'toufix.toufixbpnlt', 'consta.constatdesc', 'toufix.toufixdplay', 'toufix.toufixthour',
            'consta.constascode', 'consta.constatdesc', 'plapre.plapreicode', 'plapre.plapresscr1', 'plapre.plapresscr2')
            ->join('toutte as toutte1', 'toufix.touttescod1', 'toutte1.touttescode')
            ->join('toutte as toutte2', 'toufix.touttescod2', 'toutte2.touttescode')
            ->join('toutea as toutea1', 'toutte1.touteascode', 'toutea1.touteascode')
            ->join('toutea as toutea2', 'toutte2.touteascode', 'toutea2.touteascode')
            ->join('consta', function ($consta) use ($request) {
                $consta->on('toufix.constascode', 'consta.constascode')
                    ->where('consta.confrmicode', 3);
            })
            ->leftJoin('plapre', function ($plapre) use ($request) {
                $plapre->on('toufix.toufixicode', 'plapre.toufixicode')
                    ->where('plapre.tougplicode', $request->tougplicode);
            })
            ->where('toutte1.touinfscode', $request->touinfscode)
            ->where('toutte2.touinfscode', $request->touinfscode)
            ->where('consta.constascode', 1)->paginate(5);
        return response()->json($data);
    }

    public function inGameMatches(Request $request)
    {

        $data = DB::table('toufix')->select('toufix.toufixicode', 'toutea1.touteavimgt', 'toutea1.touteatname', 'toutea1.touteatname',
            'toufix.toufixsscr1', 'toufix.toufixspen1', 'toutea2.touteavimgt AS touteavimgt2',
            'toutea2.touteatname AS touteatname2', 'toufix.toufixsscr2',
            'toufix.toufixspen2', 'toufix.toufixbpnlt', 'consta.constatdesc', 'toufix.toufixdplay', 'toufix.toufixthour',
            'consta.constascode', 'consta.constatdesc', 'plapre.plapreicode', 'plapre.plapresscr1', 'plapre.plapresscr2')
            ->join('toutte as toutte1', 'toufix.touttescod1', 'toutte1.touttescode')
            ->join('toutte as toutte2', 'toufix.touttescod2', 'toutte2.touttescode')
            ->join('toutea as toutea1', 'toutte1.touteascode', 'toutea1.touteascode')
            ->join('toutea as toutea2', 'toutte2.touteascode', 'toutea2.touteascode')
            ->join('consta', function ($consta) use ($request) {
                $consta->on('toufix.constascode', 'consta.constascode')
                    ->where('consta.confrmicode', 3);
            })
            ->leftJoin('plapre', function ($plapre) use ($request) {
                $plapre->on('toufix.toufixicode', 'plapre.toufixicode')
                    ->where('plapre.tougplicode', $request->tougplicode);
            })
            ->where('toutte1.touinfscode', $request->touinfscode)
            ->where('toutte2.touinfscode', $request->touinfscode)
            ->where('consta.constascode', 2)->paginate(5);
        return response()->json($data);
    }
    public function finishedMatches(Request $request)
    {

        $data = DB::table('toufix')->select('toufix.toufixicode', 'toutea1.touteavimgt', 'toutea1.touteatname', 'toutea1.touteatname',
            'toufix.toufixsscr1', 'toufix.toufixspen1', 'toutea2.touteavimgt AS touteavimgt2',
            'toutea2.touteatname AS touteatname2', 'toufix.toufixsscr2',
            'toufix.toufixspen2', 'toufix.toufixbpnlt', 'consta.constatdesc', 'toufix.toufixdplay', 'toufix.toufixthour',
            'consta.constascode', 'consta.constatdesc', 'plapre.plapreicode', 'plapre.plapresscr1', 'plapre.plapresscr2', 'plapre.plapredcrea')
            ->join('toutte as toutte1', 'toufix.touttescod1', 'toutte1.touttescode')
            ->join('toutte as toutte2', 'toufix.touttescod2', 'toutte2.touttescode')
            ->join('toutea as toutea1', 'toutte1.touteascode', 'toutea1.touteascode')
            ->join('toutea as toutea2', 'toutte2.touteascode', 'toutea2.touteascode')
            ->join('consta', function ($consta) use ($request) {
                $consta->on('toufix.constascode', 'consta.constascode')
                    ->where('consta.confrmicode', 3);
            })
            ->leftJoin('plapre', function ($plapre) use ($request) {
                $plapre->on('toufix.toufixicode', 'plapre.toufixicode')
                    ->where('plapre.tougplicode', $request->tougplicode);
            })
            ->where('toutte1.touinfscode', $request->touinfscode)
            ->where('toutte2.touinfscode', $request->touinfscode)
            ->where('consta.constascode', 3)->orderBy('toufix.toufixicode', 'desc')->paginate(5);
        return response()->json($data);
    }

    public function myInvitationsCount(Request $request)
    {
        /*$data = DB::select('Select tougrp.tougrpicode, tougrp.tougrpvimgg, tougrp.tougrptname, touinf.touinftname
        from tougrp
        join tougpl on tougrp.tougrpicode = tougpl.tougrpicode
        join touinf on tougrp.touinfscode = touinf.touinfscode
        where tougpl.plainficode = ? and tougpl.constascode = 1', [$request->user()->plainficode]);*/

        $data = DB::table('tougrp')->select('tougrp.tougrpicode', 'tougrp.tougrpvimgg', 'tougrp.tougrptname', 'touinf.touinftname', 'touinf.touinfvlogt')
            ->join('tougpl', 'tougrp.tougrpicode', 'tougpl.tougrpicode')
            ->join('touinf', 'tougrp.touinfscode', 'touinf.touinfscode')
            ->where('tougpl.plainficode', $request->user()->plainficode)
            ->where('tougpl.constascode', 1)->count();
        return response()->json($data);

    }
    public function myInvitationsApi(Request $request)
    {
        /*$data = DB::select('Select tougrp.tougrpicode, tougrp.tougrpvimgg, tougrp.tougrptname, touinf.touinftname
        from tougrp
        join tougpl on tougrp.tougrpicode = tougpl.tougrpicode
        join touinf on tougrp.touinfscode = touinf.touinfscode
        where tougpl.plainficode = ? and tougpl.constascode = 1', [$request->user()->plainficode]);*/

        $data = DB::table('tougrp')->select('tougrp.tougrpicode', 'tougrp.tougrpvimgg', 'tougrp.tougrptname', 'touinf.touinftname', 'touinf.touinfvlogt')
            ->join('tougpl', 'tougrp.tougrpicode', 'tougpl.tougrpicode')
            ->join('touinf', 'tougrp.touinfscode', 'touinf.touinfscode')
            ->where('tougpl.plainficode', $request->user()->plainficode)
            ->where('tougpl.constascode', 1)->paginate(5);
        return response()->json($data);

    }
    public function tincazosApi(Request $request)
    {

        $data = DB::table('toufix')->select('toufix.toufixicode', 'toutea1.touteavimgt', 'toutea1.touteatname',
            'toufix.toufixsscr1', 'toufix.toufixspen1', 'toutea2.touteavimgt as touteavimgt2',
            'toutea2.touteatname as touteatname2', 'toufix.toufixsscr2', 'toufix.toufixspen2', 'toufix.toufixbpnlt',
            'consta.constatdesc', 'toufix.toufixdplay', 'toufix.toufixthour', 'consta.constascode',
            'consta.constatdesc', 'plapre.plapreicode', 'plapre.plapresscr1', 'plapre.plapresscr2',
            'plainf.plainftnick', 'plapre.plaprethour', 'plapre.plapredcrea')
            ->join('toutte as toutte1', 'toufix.touttescod1', 'toutte1.touttescode')
            ->join('toutte as toutte2', 'toufix.touttescod2', 'toutte2.touttescode')
            ->join('toutea as toutea1', 'toutte1.touteascode', 'toutea1.touteascode')
            ->join('toutea as toutea2', 'toutte2.touteascode', 'toutea2.touteascode')
            ->join('consta', function ($consta) use ($request) {
                $consta->on('toufix.constascode', 'consta.constascode')
                    ->where('consta.confrmicode', 3);
            })
            ->join('plapre', 'toufix.toufixicode', 'plapre.toufixicode')
            ->join('tougpl', 'plapre.tougplicode', 'tougpl.tougplicode')
            ->join('plainf', function ($plainf) use ($request) {
                $plainf->on('tougpl.plainficode', 'plainf.plainficode')
                    ->where('tougpl.tougrpicode', $request->tougrpicode);
            })
            ->where('toutte1.touinfscode', $request->touinfscode)
            ->where('toutte2.touinfscode', $request->touinfscode)
            ->where('toufix.toufixicode', $request->toufixicode)
            ->where('toufix.constascode', '>', 1)
            ->orderBy('plainf.plainftnick')->paginate(20);
        return response()->json($data);

    }
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        $data = DB::table('secusr')
            ->join('plainf', 'plainf.plainficode', 'secusr.plainficode')
            ->join('conmem', 'plainf.conmemscode', 'conmem.conmemscode')
            ->where('secusr.secusricode', $request->user()->secusricode)->first();
        return response()->json($data);
    }
}

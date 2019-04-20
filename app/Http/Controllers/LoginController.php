<?php

namespace App\Http\Controllers;

use App\plainf;
use App\secusr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use Socialite;

class LoginController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        // dd($user);
        $secusr = secusr::where('secusrtmail', $user->email)->orWhere('secusrtface', $user->id)->first();
            $plainf = plainf::where('plainficode', $secusr->plainficode)->first();
        
        $conmem = DB::table('conmem')->where('conmemscode', $plainf->conmemscode)->first();

        if ($secusr) {
            Session::put('secusrtmail', $secusr->secusrtmail);
            Session::put('secusricode', $secusr->secusricode);
            Session::put('plainficode', $plainf->plainficode);
            Session::put('plainftnick', $plainf->plainftnick);
            Session::put('conmemscode', $plainf->conmemscode);
            Session::put('conmemvimgm', $conmem->conmemvimgm);
            return redirect('/');
        } else {
            return Redirect::route('editarPerfil')
                ->with('secusrtmails', $user->email)
                ->with('plainfvimgps', $user->avatar)
                ->with('plainftnames', $user->name)
                ->with('plainftgders', $user->user['gender'])
                ->with('secusrtfaces', $user->id);
        }

        // dd($user);
    }
    public function verify($user)
    {

    }
    public function logout()
    {
        Session::flush();
        session()->regenerate();
        return redirect('/');
    }
    public function login(Request $request)
    {

        $password = $request->secusrtpass;
        $secusr   = secusr::where('secusrtmail', $request->secusrtmail)->get();

        if ($secusr->count() == 0) {

            return response()->json(['mensaje' => 'Estas credenciales no coinciden con nuestros registros', 'success' => 0]);
        } else {
            $secusrEnable = secusr::where('secusrtmail', $request->secusrtmail)->where('secusrbenbl', 1)->get();
            if ($secusrEnable->count() == 0) {

                return response()->json(['mensaje' => 'Este usuario se encuentra eliminado, consulte con el administrador', 'success' => 0]);
            } else {

                foreach ($secusr as $user) {

                    $secusrtpass = $user->secusrtpass;
                    $secusricode = $user->secusricode;
                    $secusrtmail = $user->secusrtmail;
                    $plainficode = $user->plainficode;
                    $contypscode = $user->contypscode;
                }

                if ($secusrtpass != $password) {

                    return response()->json(['mensaje' => 'Estas credenciales no coinciden con nuestros registros', 'success' => 0]);
                } else {
                    $date = Carbon::now();
                    DB::beginTransaction();
                    try {
                        $plainf = plainf::find($plainficode);
                        $conmem = DB::table('conmem')->where('conmemscode', $plainf->conmemscode)->first();
                        Session::put('secusrtmail', $secusrtmail);
                        Session::put('secusricode', $secusricode);
                        Session::put('plainficode', $plainficode);
                        Session::put('contypscode', $contypscode);
                        Session::put('plainftnick', $plainf->plainftnick);
                        Session::put('conmemscode', $plainf->conmemscode);
                        Session::put('conmemvimgm', $conmem->conmemvimgm);
                        DB::commit();
                        return response()->json(['mensaje' => 'Inicio de session correctamente', 'success' => 1]);

                        // all good
                    } catch (\Exception $e) {
                        return $e;
                        DB::rollback();
                        // something went wrong
                    }

                }

            }

            // session(['secusrtname' => 'me@example.com']); //usando el helper
        }
    }
}

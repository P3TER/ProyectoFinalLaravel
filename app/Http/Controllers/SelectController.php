<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Incendio;

class SelectController extends Controller
{
    public function login(Request $request)
    {
        if (Session::has('id')) {
            return redirect('incendios');
        } else {
            if ($request->isMethod('get')) {
                return view('login');
            } elseif ($request->isMethod('post')) {
                $ver = User::where('user', $request->input('user'))->first();
                if ($ver) { 
                    if ($request->input('pass') == $ver->pass) { 
                        Session::put('id', $ver->id);
                        return redirect("incendios");
                    } else {
                        return redirect("/")->with('error', 'Contraseña incorrecta');
                    }
                } else {
                    return redirect("/")->with('error', 'Usuario no encontrado');
                }
            }
        }
    }

    public function incendios(Request $request)
    {
        if (!Session::has('id')) {
            return redirect('login');
        } else {
            $user = User::find(Session::get('id'));
            $incendios = Incendio::where('department', $user->department)->get();
            $usuario = User::all();
            return view('incendios', ['incendios' => $incendios])->with('user', $usuario);
        }
    }

    public function endSession(Request $request){
        Session::flush();
        return redirect('login');
    }
}

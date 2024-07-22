<?php

namespace App\Http\Controllers;

use App\Models\Incendio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class CreateController extends Controller
{
    public function createUser(Request $request)
    {
        if (Session::has('id')) {
            return redirect("incendios");
        } else {
            $api = Http::withoutVerifying()->get('https://raw.githubusercontent.com/marcovega/colombia-json/master/colombia.min.json')->json();
            $departamentos = collect($api)->map(function ($item) {
                return $item["departamento"];
            });
            if ($request->isMethod("GET")) {
                return view('RegistroU', ["departments" => $departamentos]);
            } elseif ($request->isMethod("POST")) {
                $user = new User();
                $user->user = $request->input("user");
                $user->department = $request->input("department");
                $user->pass = $request->input("pass");
                $user->save();

                return redirect("login");
            }
        }
    }

    public function createFire(Request $request)
    {
        if (Session::has("id")) {
            $api = Http::withoutVerifying()->get('https://raw.githubusercontent.com/marcovega/colombia-json/master/colombia.min.json')->json();
            $user = User::find(Session::get('id'));
            $departamento = $user->department;
            $ciudades = collect($api)->filter(function ($item) use ($departamento) {
                return $item["departamento"] === $departamento;
            })->flatMap(function ($item) {
                return $item["ciudades"];
            });
            if ($request->isMethod("get")) {
                return view("registroInc", ["ciudades" => $ciudades]);
            } elseif ($request->isMethod("POST")) {
                $user = User::find(Session::get("id"));
                $incendio = new Incendio();
                $incendio->department = $user->department;
                $incendio->town = $request->input('town');
                $incendio->date = $request->input('date');
                $incendio->user_id = Session::get("id");
                $incendio->save();
                return redirect('incendios');
            }
        }
    }
}

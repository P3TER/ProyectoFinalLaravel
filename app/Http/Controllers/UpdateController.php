<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Incendio;

class UpdateController extends Controller
{
    public function actualizar(Request $request, $id)
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
                $incendio = Incendio::find($id);
                return view("actualizar", ["incendio" => $incendio, "ciudades" => $ciudades]);
            } elseif ($request->isMethod("post")) {
                $incendio = Incendio::find($id);
                $incendio->town = $request->input('town');
                $incendio->date = $request->input('date');
                $incendio->save();
                return redirect("incendios");
            }
        } else {
            return redirect("login");
        }
    }
}

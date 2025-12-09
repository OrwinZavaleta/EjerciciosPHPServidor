<?php

namespace App\Http\Controllers;

use App\Models\Emple;
use App\Models\Depart;
use Illuminate\Http\Request;

class EmpleController extends Controller
{
    public function index()
    {
        $emples = Emple::all();
        return view("emples.index", compact("emples"));
    }
    public function create()
    {
        $departs = Depart::all();
        $directores = Emple::all();
        return view("emples.create", compact("departs", "directores"));
    }
    public function store(Request $request)
    {
        $request->validate([
            "emple_no" => "required|integer",
            "apellido" => "required|string",
            "oficio" => "required|string",
            "dir" => "required|integer|exists:emples,emple_no",
            "fecha_alt" => "required|date",
            "salario" => "required|numeric",
            "comision" => "required|numeric",
            "depart_no" => "required|integer|exists:departs,depart_no"
        ]);


        Emple::create([
            "emple_no" => $request["emple_no"],
            "apellido" => $request["apellido"],
            "oficio" => $request["oficio"],
            "dir" => $request["dir"],
            "fecha_alt" => $request["fecha_alt"],
            "salario" => $request["salario"],
            "comision" => $request["comision"],
            "depart_no" => $request["depart_no"],
        ]);
        return redirect()->route("emples.index");
    }
    public function show($id) {}
    public function edit($id)
    {
        $emple = Emple::find($id);
        return view("emples.edit", compact("emple"));
    }
    public function update($id, Request $request)
    {
        $request->validate([
            "dnombre" => "required|string",
            "loc" => "required|string"
        ]);

        Emple::find($id)->update([
            "dnombre" => $request["dnombre"],
            "loc" => $request["loc"],
        ]);
        return redirect()->route("emples.index");
    }
    public function destroy($id)
    {
        Emple::findOrFail($id)->delete();
        return redirect()->route("emples.index");
    }
}

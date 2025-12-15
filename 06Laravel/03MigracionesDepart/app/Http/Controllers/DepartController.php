<?php

namespace App\Http\Controllers;

use App\Models\Depart;
use Illuminate\Http\Request;

class DepartController extends Controller
{
    public function index()
    {
        $departs = Depart::all();
        return view("departs.index", compact("departs"));
    }
    public function create()
    {
        return view("departs.create");
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            "depart_no" => "required|integer|unique:departs,depart_no",
            "dnombre" => "required|string",
            "loc" => "required|string"
        ]);


        try {
            $depart = new Depart($validated);
            // $depart->depart_no = $request["depart_no"];
            // $depart->dnombre = $request["dnombre"];
            // $depart->loc = $request["loc"];
            $depart->save();
        } catch (\Exception $e) {
            error_log("error al borrar " . $e->getMessage());
            return redirect()->route("departs.index")->with("error", "el departamento no se pudo crear");
        }
        return redirect()->route("departs.index")->with("success", "departamento creado con exito");;
    }
    public function show($id) {}
    public function edit($id)
    {
        $depart = Depart::find($id);
        return view("departs.edit", compact("depart"));
    }
    public function update($id, Request $request)
    {
        $request->validate([
            "dnombre" => "required|string",
            "loc" => "required|string"
        ]);

        try {
            Depart::find($id)->update([
                "dnombre" => $request["dnombre"],
                "loc" => $request["loc"],
            ]);
        } catch (\Exception $e) {
            error_log("error al borrar " . $e->getMessage());
            return redirect()->route("departs.index")->with("error", "el departamento no se pudo actualizar");
        }
        return redirect()->route("departs.index")->with("success", "departamento actualizado con exito");
    }
    public function destroy($id)
    {
        try {
            Depart::findOrFail($id)->delete();
            return redirect()->route("departs.index")->with("success", "departamento borrado con exito");
        } catch (\Exception $e) {
            error_log("error al borrar " . $e->getMessage());
            return redirect()->route("departs.index")->with("error", "el departamento no se pudo borrar");
        }
    }

    public function saludo($nombre)
    {
        echo "Hola $nombre, bienvenido a esta web.";
    }
    public function saludo2($nombre = "anonymous")
    {
        echo "Hola $nombre, bienvenido a esta web.";
    }
    public function saludo3(Depart $depart)
    {
        if ($depart) {
            echo "Hola $depart->dnombre, bienvenido a esta web.";
        }
        echo "Hola anonymous, bienvenido a esta web.";
    }
}

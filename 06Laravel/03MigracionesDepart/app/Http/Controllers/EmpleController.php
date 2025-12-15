<?php

namespace App\Http\Controllers;

use App\Models\Emple;
use App\Models\Depart;
use Illuminate\Http\Request;

class EmpleController extends Controller
{
    public function index()
    {
        $emples = Emple::with("depart")->with("director")->get();
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
            "emple_no" => "required|integer|unique:emples,emple_no",
            "apellido" => "required|string",
            "oficio" => "required|string",
            "dir" => "integer|exists:emples,emple_no|nullable",
            "fecha_alt" => "required|date",
            "salario" => "required|numeric",
            "comision" => "required|numeric",
            "depart_no" => "required|integer|exists:departs,depart_no",
            "avatar" => "image|mimes:png,jpg|nullable",
        ]);

        $pathAvatar = null;
        if ($request->has("avatar")) {
            $avatar = $request->file("avatar");
            $pathAvatar = $avatar->store("fotos", "public");
        }

        try {
            Emple::create([
                "emple_no" => $request["emple_no"],
                "apellido" => $request["apellido"],
                "oficio" => $request["oficio"],
                "dir" => $request["dir"],
                "fecha_alt" => $request["fecha_alt"],
                "salario" => $request["salario"],
                "comision" => $request["comision"],
                "depart_no" => $request["depart_no"],
                "avatar" => $pathAvatar
            ]);
        } catch (\Exception $e) {
            error_log("error al borrar " . $e->getMessage());
            return redirect()->route("emples.index")->with("error", "el usuario no se pudo crear");
        }
        return redirect()->route("emples.index")->with("success", "usuario creado con exito");
    }
    public function show($id) {}
    public function edit($id)
    {
        $departs = Depart::all();
        $directores = Emple::all();
        $emple = Emple::find($id);
        return view("emples.edit", compact("departs", "directores", "emple"));
    }
    public function update($id, Request $request)
    {
        $request->validate([
            "apellido" => "required|string",
            "oficio" => "required|string",
            "dir" => "integer|exists:emples,emple_no|nullable",
            "fecha_alt" => "required|date",
            "salario" => "required|numeric",
            "comision" => "required|numeric",
            "depart_no" => "required|integer|exists:departs,depart_no",
            "avatar" => "image|mimes:png,jpg|nullable",
        ]);

        $pathAvatar = null;
        if ($request->has("avatar")) {
            $avatar = $request->file("avatar");
            $pathAvatar = $avatar->store("fotos", "public");
        }

        try {
            Emple::find($id)->update([
                "apellido" => $request["apellido"],
                "oficio" => $request["oficio"],
                "dir" => $request["dir"],
                "fecha_alt" => $request["fecha_alt"],
                "salario" => $request["salario"],
                "comision" => $request["comision"],
                "depart_no" => $request["depart_no"],
                "avatar" => $pathAvatar
            ]);
        } catch (\Exception $e) {
            error_log("error al borrar " . $e->getMessage());
            return redirect()->route("emples.index")->with("error", "el usuario no se pudo actualizar");
        }
        return redirect()->route("emples.index")->with("success", "usuario actualizado con exito");
    }
    public function destroy($id)
    {
        try {
            Emple::findOrFail($id)->delete();
            return redirect()->route("emples.index")->with("success", "usuario borrado con exito");
        } catch (\Exception $e) {
            error_log("error al borrar " . $e->getMessage());
            return redirect()->route("emples.index")->with("error", "el usuario no se pudo borrar");
        }
    }
}

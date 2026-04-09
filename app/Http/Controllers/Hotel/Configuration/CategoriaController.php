<?php

namespace App\Http\Controllers\Hotel\Configuration;

use App\Http\Controllers\Controller;
use App\Models\Hotel\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    //
    public function lista()
    {
        $lista = Categoria::orderBy('id','asc')->get();
        return response()->json([
            "data" => $lista
        ], 200);
    }
    public function ver($id)
    {
        $data = Categoria::find($id);

        return response()->json($data, 200);
    }
    public function guardar(Request $request)
    {
        $data = Categoria::firstOrNew(
            ['id' => $request->id],
        );
        $data->nombre = $request->nombre;
        $data->hotel_id = 1;
        $data->save();
        return response()->json([
            "titulo" => "Éxito",
            "mensaje" => "Se registro con éxito",
            "tipo" => "success",
            "estado" => true,
        ], 200);
    }
    public function cambiarEstado(Request $request)
    {
        $data = Categoria::find($request->id);
        $data->estado = $request->estado;
        $data->save();
        return response()->json([
            "titulo" => "Éxito",
            "mensaje" => "Se cambio el estado con éxito",
            "tipo" => "success",
            "estado" => true,
        ], 200);
    }
    public function eliminar(Request $request)
    {
        $data = Categoria::find($request->id);
        $data->estado = 2;
        $data->delete();
        return response()->json([
            "titulo" => "Éxito",
            "mensaje" => "Se elimino con éxito",
            "tipo" => "success",
            "estado" => true,
        ], 200);
    }
}

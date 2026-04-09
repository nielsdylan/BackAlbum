<?php

namespace App\Http\Controllers\Hotel\Configuration;

use App\Http\Controllers\Controller;
use App\Models\Hotel\Tarifa;
use Illuminate\Http\Request;

class TarifaController extends Controller
{
    //
    public function lista(Request $request)
    {

        $limit = $request->input('limit', 5);
        $lista = Tarifa::orderBy('id', 'asc')->paginate($limit);

        return response()->json($lista, 200);
        // Nota: Ya no es necesario envolverlo en ["data" => $lista]
        // porque paginate() ya crea una estructura con la llave 'data'.
    }
    public function ver($id)
    {
        $data = Tarifa::find($id);

        return response()->json($data, 200);
    }
    public function guardar(Request $request)
    {
        $data = Tarifa::firstOrNew(
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
        $data = Tarifa::find($request->id);
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
        $data = Tarifa::find($request->id);
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

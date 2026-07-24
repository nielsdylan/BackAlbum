<?php

namespace App\Http\Controllers\QRAdmin;

use App\Http\Controllers\Controller;
use App\Models\Albumqr\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    //
    public function lista(Request $request)
    {

        $limit = $request->input('limit', 5);
        $lista = Cliente::orderBy('id', 'asc')->paginate($limit);

        return response()->json($lista, 200);
        // Nota: Ya no es necesario envolverlo en ["data" => $lista]
        // porque paginate() ya crea una estructura con la llave 'data'.
    }
    public function ver($id)
    {
        $data = Cliente::find($id);

        return response()->json($data, 200);
    }
    public function guardar(Request $request)
    {
        // return [$request->all()];exit;
        // return [Auth::guard('api')->user()->id];exit;
        try {
            $data = Cliente::firstOrNew(
                ['id' => $request->id],
            );

            $data->titulo       = $request->titulo;
            $data->descripcion  = $request->descripcion;
            $data->plantilla_id  = $request->plantilla_id;
            $data->palabras  = $request->palabras;
            // $data->usuario_id   = Auth::guard('api')->user()->id;
            $data->save();

            return response()->json([
                "title" => "Éxito",
                "text" => "Se registro con éxito",
                "icon" => "success",
            ], 200);

        } catch (\Throwable $th) {

            return response()->json([
                "title" => "Error",
                "text" => "Error: " . $th->getMessage(),
                "line" => $th->getLine(),
                "icon" => "error"
            ], 500);

        }

    }
    public function cambiarEstado(Request $request)
    {
        try {
            $data = Cliente::find($request->id);
            $data->estado = $request->estado;
            $data->save();
            return response()->json([
                "title" => "Éxito",
                "text" => "Se cambio el estado con éxito",
                "icon" => "success",
                "tipe" => true,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                "title" => "Error",
                "text" => "Error: " . $th->getMessage(),
                "line" => $th->getLine(),
                "icon" => "error"
            ], 500);
        }
    }
    public function eliminar(Request $request)
    {
        try {
            //code...
            $data = Cliente::find($request->id);
            $data->delete();
            return response()->json([
                "title" => "Éxito",
                "text" => "Se elimino con éxito",
                "icon" => "success",
                "tipo" => true,
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                "title" => "Error",
                "text" => "Error: " . $th->getMessage(),
                "line" => $th->getLine(),
                "icon" => "error"
            ], 500);
        }
    }
}

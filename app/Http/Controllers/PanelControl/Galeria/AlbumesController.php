<?php

namespace App\Http\Controllers\PanelControl\Galeria;

use App\Http\Controllers\Controller;
use App\Models\Albumqr\Album;
use Illuminate\Http\Request;

class AlbumesController extends Controller
{
    //
    public function lista(Request $request)
    {

        $limit = $request->input('limit', 5);
        $lista = Album::orderBy('id', 'asc')->paginate($limit);

        return response()->json($lista, 200);
        // Nota: Ya no es necesario envolverlo en ["data" => $lista]
        // porque paginate() ya crea una estructura con la llave 'data'.
    }
    public function ver($id)
    {
        $data = Album::find($id);

        return response()->json($data, 200);
    }
    public function guardar(Request $request)
    {
        try {
            $data = Album::firstOrNew(
                ['id' => $request->id],
            );

            $data->nombre = $request->nombre;
            $data->descripcion = $request->descripcion;
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
            $data = Album::find($request->id);
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
            $data = Album::find($request->id);
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

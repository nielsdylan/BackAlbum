<?php

namespace App\Http\Controllers\PanelControl\Galeria;

use App\Http\Controllers\Controller;
use App\Models\Albumqr\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
        // return [$request->all()];exit;
        // return [Auth::guard('api')->user()->id];exit;
        try {
            $data = Album::firstOrNew(
                ['id' => $request->id],
            );

            $data->titulo       = $request->titulo;
            $data->descripcion  = $request->descripcion;
            $data->plantilla_id  = $request->plantilla_id;
            $data->palabras  = $request->palabras;
            $data->usuario_id   = Auth::guard('api')->user()->id;
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
    public function allAlbumes()
    {

        $data = Album::all();

        return response()->json($data, 200);
        // Nota: Ya no es necesario envolverlo en ["data" => $lista]
        // porque paginate() ya crea una estructura con la llave 'data'.
    }
    public function generarQR($id)
    {
        $album = Album::find($id);
        $link = 'http://localhost:5173/template/plantilla1/'.$album->usuario_id;
        $png = QrCode::format('png')
        ->size(300)
        ->color(0, 0, 0)       // Color del QR (Rojo)
        ->backgroundColor(255, 255, 255) // Fondo (Blanco)
        ->generate($link);
        $base64Image = base64_encode($png);
        return response()->json([
            "imagen" => $base64Image,
            "link"=>$link,
        ], 200);
    }
}

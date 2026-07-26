<?php

namespace App\Http\Controllers\PanelControl\Galeria;

use App\Http\Controllers\Controller;
use App\Models\Albumqr\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FotosController extends Controller
{
    //
    public function lista(Request $request)
    {

        $limit = $request->input('limit', 5);
        $lista = Imagen::where('cliente_id',Auth::guard('api_cliente')->user()->id)->orderBy('id', 'asc')->paginate($limit);

        return response()->json($lista, 200);
        // Nota: Ya no es necesario envolverlo en ["data" => $lista]
        // porque paginate() ya crea una estructura con la llave 'data'.
    }
    public function ver($id)
    {
        $data = Imagen::find($id);

        return response()->json($data, 200);
    }
    public function guardar(Request $request)
    {
        // return [$request->all()];exit;
        // return [Auth::guard('api_cliente')->user()->id];exit;
        try {
            $data = Imagen::firstOrNew(
                ['id' => $request->id],
            );

            $data->nombre       = $request->nombre;

            $data->titulo       = $request->titulo;

            $data->description  = $request->descripcion;

            if ($request->hasFile('imagen')) {

                if ($data->imagen && Storage::disk('public')->exists($data->imagen)) {

                    Storage::disk('public')->delete($data->imagen);

                }
                $file = $request->file('imagen');

                $nombreUnico = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                $rutaArchivo = $file->storeAs('panel-control/galeria', $nombreUnico, 'public');

                $data->path = $rutaArchivo;

                $data->name_image   = $request->name_imagen;

                $data->weight       = $request->weight;

                $data->extension    = $request->extension;

                $data->weightKB     = $request->weightKB;
            }


            $data->cliente_id   = Auth::guard('api_cliente')->user()->id;

            $data->albumes_id   = $request->album_id;

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
            $data = Imagen::find($request->id);
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
            $data = Imagen::find($request->id);
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
    public function allImagenes()
    {

        $data = Imagen::all();

        return response()->json($data, 200);
        // Nota: Ya no es necesario envolverlo en ["data" => $lista]
        // porque paginate() ya crea una estructura con la llave 'data'.
    }
    public function allUsuario($usuario_id)
    {

        $data = Imagen::where('usuario_id',$usuario_id)->get();

        return response()->json($data, 200);
        // Nota: Ya no es necesario envolverlo en ["data" => $lista]
        // porque paginate() ya crea una estructura con la llave 'data'.
    }
}

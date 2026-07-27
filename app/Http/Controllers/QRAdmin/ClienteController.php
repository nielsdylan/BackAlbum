<?php

namespace App\Http\Controllers\QRAdmin;

use App\Http\Controllers\Controller;
use App\Models\Albumqr\Cliente;
use App\Models\Albumqr\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ClienteController extends Controller
{
    //
    public function lista(Request $request)
    {

        $limit = $request->input('limit', 5);
        // $lista = Cliente::orderBy('id', 'asc')->paginate($limit);


        // Agregamos with('persona') para cargar la relación
        $lista = Cliente::with('persona')
        ->orderBy('id', 'asc')
        ->paginate($limit);

        return response()->json($lista, 200);
        // Nota: Ya no es necesario envolverlo en ["data" => $lista]
        // porque paginate() ya crea una estructura con la llave 'data'.
    }
    public function ver($id)
    {
        // $data = Cliente::find($id);
        $data = Cliente::with('persona')->where('persona_id', $id)->first();
        return response()->json($data, 200);
    }
    public function guardar(Request $request)
    {
        // return [$request->all()];exit;
        // return [Auth::guard('api')->user()->id];exit;
        try {
        // return $request->all();
            $persona = Persona::firstOrNew(
                ['id' => $request->id],
            );

            $persona->numero_documento = $request->numero_documento;
            $persona->apellidos        = Str::upper($request->apellidos);
            $persona->nombres          = Str::upper($request->nombres);
            $persona->telefono         = $request->telefono;
            // $data->usuario_id   = Auth::guard('api')->user()->id;
            $persona->save();

            // Tomamos la primera letra y la pasamos a mayúscula
            $inicialNombre   = mb_strtoupper(mb_substr($request->nombres, 0, 1));
            $inicialApellido = mb_strtoupper(mb_substr($request->apellidos, 0, 1));

            // Concatenamos ambas iniciales
            $iniciales = $inicialNombre . $inicialApellido; // Ejemplo: "JP"

            $cliente = Cliente::firstOrNew(
                ['persona_id' => $persona->id],
            );

            $cliente->email     = $request->email;
            $cliente->name      = $iniciales;
            $cliente->password  = Hash::make($request->password);
            // $data->usuario_id   = Auth::guard('api')->user()->id;
            $cliente->save();

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

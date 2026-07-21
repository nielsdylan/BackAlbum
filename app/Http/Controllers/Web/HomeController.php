<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Albumqr\Album;
use App\Models\Albumqr\Imagen;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function allFotos($usuario_id, $album_id)
    {
        $album = Album::find($album_id);
        $data = Imagen::where('usuario_id',$usuario_id)->where('albumes_id',$album_id)->get();
        return response()->json([
            "imagenes" => $data,
            "album" => $album
        ], 200);
    }
}

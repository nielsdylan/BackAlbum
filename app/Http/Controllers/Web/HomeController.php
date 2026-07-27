<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Albumqr\Album;
use App\Models\Albumqr\Imagen;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function allFotos($cliente_id, $album_id)
    {
        $album = Album::find($album_id);
        $data = Imagen::where('cliente_id',$cliente_id)->where('albumes_id',$album_id)->where('estado',1)->get();
        return response()->json([
            "imagenes" => $data,
            "album" => $album
        ], 200);
    }
}

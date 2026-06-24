<?php

namespace App\Http\Controllers\PanelControl;

use App\Http\Controllers\Controller;
use App\Models\Albumqr\Plantilla;
use Illuminate\Http\Request;

class PlantillaController extends Controller
{
    //
    public function lista()
    {

        $data = Plantilla::all();

        return response()->json($data, 200);
    }
}

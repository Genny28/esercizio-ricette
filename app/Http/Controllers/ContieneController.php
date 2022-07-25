<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelContiene;
use Carbon\Carbon;

class ContieneController extends Controller
{
    public function store_contiene(Request $request)
    {
        try {
            $contiene = new ModelContiene();
            $contiene->id_ricetta = $request->id_ricetta;
            $contiene->id_ingrediente = $request->id_ingrediente;

            $contiene->created_at = Carbon::now();
            $contiene->updated_at = Carbon::now();
            $contiene->save();

            return response()->json([
                'message' => 'contenuto inserito con successo',
                'contiene' => $contiene,
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            return response()->json([
            'message' => 'contenuto non inserito',
            'contiene' => $contiene,
            'status' => 201,
            '4' => $e,
            ]);
        }
    }
}



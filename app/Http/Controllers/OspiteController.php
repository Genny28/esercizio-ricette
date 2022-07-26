<?php

namespace App\Http\Controllers;

use App\Models\ModelOspite;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OspiteController extends Controller
{
    public function store_ospite(Request $request)
    {
        try {
            $ospite = new ModelOspite();
            $ospite->id_ricetta = $request->id_ricetta;
            $ospite->nome_ospite = $request->nome_ospite;
            $ospite->voto = $request->voto;


            $ospite->created_at = Carbon::now();
            $ospite->updated_at = Carbon::now();
            $ospite->save();

            return response()->json([
                'message' => 'ospite inserito con successo',
                'ospite' => $ospite,
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'ospite non inserito',
                'ospite' => $ospite,
                'status' => 201,
                '4' => $e,
            ]);
        }
    }
}



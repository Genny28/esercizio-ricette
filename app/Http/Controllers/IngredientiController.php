<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelIngredienti;
use Carbon\Carbon;

class IngredientiController extends Controller
{
    public function store_ingredienti(Request $request)
    {
        try {
            $ingrediente = new ModelIngredienti();
            $ingrediente->nome_ingrediente = $request->nome_ingrediente;
            $ingrediente->misura = $request->misura;

            $ingrediente->created_at = Carbon::now();
            $ingrediente->updated_at = Carbon::now();
            $ingrediente->save();

            return response()->json([
                'message' => 'ingrediente inserito con successo',
                'ingrediente' => $ingrediente,
                'status' => 200,
            ]);
        } catch (\Exception $e) {

            return response()->json([

                'message' => 'ingrediente non inserito',
                'ingrediente' => $ingrediente,
                'status' => 201,
                '4' => $e,

            ]);
        }
    }

    function searchIngredienti($ingrediente)
    {
        return ModelIngredienti::where("nome_ingrediente",$ingrediente)->get();
    }

}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelImmagini;
use Carbon\Carbon;

class ImmaginiController extends Controller
{
    public function store_immagini(Request $request)
    {
        try {
            $immagine = new ModelImmagini();
            $immagine->id_ricetta = $request->id_ricetta;

            //Upload IMMAGINI
            // $ricetta->immagini = $request->immagini->store('public/uploads/');

            $immagine->prima_immagine = $request->prima_immagine->store('public/uploads/');
            $immagine->seconda_immagine = $request->seconda_immagine->store('public/uploads/');
            $immagine->terza_immagine = $request->terza_immagine->store('public/uploads/');

            $immagine->created_at = Carbon::now();
            $immagine->updated_at = Carbon::now();
            $immagine->save();

            return response()->json([
                'message' => 'immagine inserita con successo',
                'immagine' => $immagine,
                'status' => 200,
            ]);
        } catch (\Exception $e) {

            return response()->json([

                'message' => 'immagine non inserita',
                'immagine' => $immagine,
                'status' => 201,
                '4' => $e,

            ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\ModelRicetta;
use Carbon\Carbon;

class RicettaController extends Controller
{
    //Inserimento_______________________________________________________________________________________________________
    public function store_ricette(Request $request)
    {
        try {
            $ricetta = new ModelRicetta;
            $ricetta->id_utente = $request->id_utente;
            $ricetta->titolo = $request->titolo;
            $ricetta->introduzione = $request->introduzione;
            $ricetta->preparazione = $request->preparazione;
            $ricetta->tipologia = $request->tipologia;
            $ricetta->difficolta = $request->difficolta;


            $ricetta->created_at = Carbon::now();
            $ricetta->updated_at = Carbon::now();
            $ricetta->save();

            return response()->json([
                'message' => 'ricetta creata con successo',
                'utente' => $ricetta,
                'status' => 200,
            ]);

        } catch (\Exception $e) {

            return response()->json([

                'message' => 'ricetta non creata',
                'utente' => $ricetta,
                'status' => 201,
                '4' => $e,

            ]);
        }
    }


    //Ricerca_________________________________________________________________________________________________________
    function searchTitolo($titolo)
    {
        return ModelRicetta::where("titolo",$titolo)->get();
    }
    function searchTipologia($tipologia)
    {
        return ModelRicetta::where("tipologia",$tipologia)->get();
    }
    function searchDifficolta($difficolta)
    {
        return ModelRicetta::where("difficolta",$difficolta)->get();
    }

}

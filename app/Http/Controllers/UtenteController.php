<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelUtente;
use Carbon\Carbon;

class UtenteController extends Controller
{
    public function store_utenti(Request $request)
    {
        try{
            $utente = new ModelUtente;
            $utente->nome=$request->nome;
            $utente->cognome=$request->cognome;

            $utente->created_at=Carbon::now();
            $utente->updated_at=Carbon::now();
            $utente->save();

            return response()->json([
                'message'=>'utente creato con successo',
                'utente'=>$utente,
                'status'=>200,
            ]);

        } catch(\Exception $e) {

            return response()->json([

            'message'=>'utente non creato',
            'utente'=>$utente,
            'status'=>201,
             '4' => $e,

            ]);
        }
    }
}

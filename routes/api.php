<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UtenteController;
use App\Http\Controllers\RicettaController;
use App\Http\Controllers\IngredientiController;
use App\Http\Controllers\ContieneController;
use App\Http\Controllers\ImmaginiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Routes Private
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::Post('store-utenti',[UtenteController::class,'store_utenti']);
    Route::Post('store-ricette',[RicettaController::class,'store_ricette']);
});

//Routes Pubblice
Route::post('/register', [AdminController::class,'register']);

//Inserimento
//Route::Post('store-utenti',[UtenteController::class,'store_utenti']);
//Route::Post('store-ricette',[RicettaController::class,'store_ricette']);
Route::Post('store-ingredienti',[IngredientiController::class,'store_ingredienti']);
Route::Post('store-contenuto',[ContieneController::class,'store_contiene']);
Route::Post('store-immagini',[ImmaginiController::class,'store_immagini']);

//Ricerca
Route::get("searchTitolo/{titolo}",[RicettaController::class,'searchTitolo']);
Route::get("searchTipologia/{tipologia}",[RicettaController::class,'searchTipologia']);
Route::get("searchDifficolta/{difficolta}",[RicettaController::class,'searchDifficolta']);
Route::get("searchIngredienti/{ingrediente}",[IngredientiController::class,'searchIngredienti']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

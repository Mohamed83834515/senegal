<?php

use App\Http\Controllers\Etat_Rapport\EtatPTBAController;
use App\Http\Controllers\Parametrages\ProjetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/projets', [ProjetController::class,'projetAll']);
Route::get('/ptba', [EtatPTBAController::class,'allAllPtba']);
Route::get('/partenaires', [EtatPTBAController::class,'AllPartenaire']);
Route::get('/budget', [EtatPTBAController::class,'AllBudget']);

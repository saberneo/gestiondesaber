<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\FiliereAPIController;
use App\Http\Controllers\EtudiantAPIController;

use App\Http\Controllers\FiliereController;
use PhpParser\Builder\Namespace_;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});





    Route::get('etudiants', [EtudiantAPIController::class, 'index']);
  
    Route::post('etudiants', [EtudiantAPIController::class, 'store']);
    Route::get('etudiants/{id}', [EtudiantAPIController::class, 'show']);
    Route::put('etudiants/{id}', [EtudiantAPIController::class, 'update']);
    Route::delete('etudiants/{id}', [EtudiantAPIController::class, 'destroy']);


    Route::get('filieres', [FiliereAPIController::class, 'index']);
    Route::post('/api/filieres', [FiliereAPIController::class, 'store']);
    Route::get('/api/filieres/{id}', [FiliereAPIController::class, 'show']);
    Route::put('/api/filieres/{id}', [FiliereAPIController::class, 'update']);
    Route::delete('/api/filieres/{id}', [FiliereAPIController::class, 'destroy']);


// Routes pour les filières
    // Route::get('filieres', [FiliereController::class, 'index']);
    // Route::post('/api/filieres', [FiliereController::class, 'store']);
    // Route::get('/api/filieres/{id}', [FiliereController::class, 'show']);
    // Route::put('/api/filieres/{id}', [FiliereController::class, 'update']);
    // Route::delete('/api/filieres/{id}', [FiliereController::class, 'destroy']);
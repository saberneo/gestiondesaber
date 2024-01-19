<?php

use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\FiliereController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/etudiants', [EtudiantController::class, 'index']);
Route::get('/etudiants/create', [EtudiantController::class, 'create']);
Route::post('/etudiants/insert', [EtudiantController::class, 'store']);
Route::get('/etudiants/delete/{id}', [EtudiantController::class, 'destroy']);
Route::get('/etudiants/edit/{id}', [EtudiantController::class, 'edit']);
Route::put('/etudiants/update/{id}', [EtudiantController::class, 'update']);
Route::get('/etudiants/show/{id}', [EtudiantController::class, 'show']);


Route::get('/filieres', [FiliereController::class, 'index']);

Route::get('/filieres/create', [FiliereController::class, 'create']);
Route::post('/filieres/insert', [FiliereController::class, 'store']);
Route::get('/filieres/delete/{id}', [FiliereController::class, 'destroy']);
Route::get('/filieres/edit/{id}', [FiliereController::class, 'edit']);
Route::put('/filieres/update/{id}', [FiliereController::class, 'update']);
Route::get('/filieres/show/{id}', [FiliereController::class, 'show']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

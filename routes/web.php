<?php

use App\Http\Controllers\EtudiantController;
use Illuminate\Http\Request;
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
    return view('welcome');
});

Route::get('/liste/etudiant', [EtudiantController::class, 'listeEtudiant']);
Route::post('/ajouter/etudiant', [EtudiantController::class, 'ajouterEtudiantTraitement']);
Route::get('/ajouter/etudiant', [EtudiantController::class, 'ajouterEtudiant']);
Route::get('/liste/etudiant', [EtudiantController::class, 'listeEtudiant']);
Route::get('/update/etudiant/{id}', [EtudiantController::class, 'updateEtudiant']);
Route::post('/update/etudiant', [EtudiantController::class, 'updateEtudiantTraitement']);
Route::post('/delete/etudiant/${id}', [EtudiantController::class, 'deleteEtudiant']);
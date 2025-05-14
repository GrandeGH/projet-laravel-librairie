<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibrairieController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/indexLivre', [LibrairieController::class, 'index']);
Route::get('/createLivre', [LibrairieController::class, 'create']);
Route::post('/livres/store', [LibrairieController::class, 'store']);
Route::get('/livres/{id}', [LibrairieController::class, 'show']);
Route::get('/livres/{id}/edit', [LibrairieController::class, 'edit']);
Route::put('/livres/{id}', [LibrairieController::class, 'update']);
Route::delete('/livres/{id}', [LibrairieController::class, 'destroy']); 
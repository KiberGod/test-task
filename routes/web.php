<?php

use App\Http\Controllers\GenresController;
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
    return view('index');
});

Route::get('/genres/view', [GenresController::class, 'index']);

Route::get('/genres/create', [GenresController::class, 'create']);

Route::post('/genres/create', [GenresController::class, 'store']);

Route::get('/genres/view/{genre}', [GenresController::class, 'show']);

Route::delete('/genres/edit/{genre}', [GenresController::class, 'destroy']);

Route::get('/genres/edit/{genre}', [GenresController::class, 'edit']);

Route::patch('/genres/edit/{genre}', [GenresController::class, 'update']);

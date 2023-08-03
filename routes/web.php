<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;

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
Route::get('/teste', function () {
    return view('teste');
});

Route::get('/series', [SeriesController::class, 'index']);
Route::get('/series/criar', [SeriesController::class, 'create']);
Route::post('/series/salvar', [SeriesController::class, 'store']);
Route::get('/series/visualisar/{id}', [SeriesController::class, 'view']);
Route::get('/series/editar/{id}', [SeriesController::class, 'edit']);
Route::post('/series/editar/{id}', [SeriesController::class, 'update']);
Route::get('/series/deletar/{id}', [SeriesController::class, 'delete']);

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
    return redirect('/series');
});
Route::get('/teste', function () {
    return view('teste');
});

Route::controller(SeriesController::class)->group(function(){
    Route::get('/series', 'index')->name('series.index');
    Route::get('/series/criar', 'create')->name('series.create');
    Route::post('/series/salvar', 'store')->name('series.store');
    Route::get('/series/visualisar/{id}', 'view')->name('series.view');
    Route::get('/series/editar/{id}', 'edit')->name('series.edit');
    Route::post('/series/editar/{id}', 'update')->name('series.update');
    Route::get('/series/deletar/{id}', 'delete')->name('series.delete');
    // Route::get('/series', 'index')->name('series.index');
    // Route::get('/series/criar', 'create')->name('series.create');
    // Route::post('/series/salvar', 'store')->name('serie.store');
    // Route::get('/series/visualisar/{id}', 'view')->name('series.view');
    // Route::get('/series/editar/{id}', 'edit')->name('series.edit');
    // Route::post('/series/editar/{id}', 'update')->name('series.update');
    // Route::get('/series/deletar/{id}', 'delete')->name('series.delete');
});


<?php

use App\Http\Controllers\SeasonsController;
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

Route::resource('/series', SeriesController::class);

Route::get('/series/{series}/seasons', [SeasonsController::class, 'index' ])->name('seasons.index');
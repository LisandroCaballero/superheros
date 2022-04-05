<?php

use App\Http\Controllers\SuperHerosController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', 'SuperHerosController@index')->name('superheros');
Route::get('/superheros', 'SuperHerosController@getAllSuperHeros')->name('superherosAll');
Route::get('superheros/{superheros}', [SuperHerosController::class, 'show'])->name('api.v1.superHeros.show');

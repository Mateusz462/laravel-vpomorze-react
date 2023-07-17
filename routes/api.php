<?php

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

Route::post('ogloszenia/get', [App\Http\Controllers\API\HomeController::class, 'getAllAnnouments']);
Route::get('graph-get-users', [App\Http\Controllers\API\GraphController::class, 'getAllUsers']);
Route::post('graph-get-users-duties', [App\Http\Controllers\API\GraphController::class, 'getUsersDuties']);
Route::get('graph-get-user/{user}', [App\Http\Controllers\API\GraphController::class, 'getUser']);
// http://localhost:8000/api/graph-get-user/1

//Edytor linii API
Route::get('lines-get-all', [App\Http\Controllers\API\LinesController::class, 'getAllLines']);
Route::get('lines-get-busstop/{lines}/{day}', [App\Http\Controllers\API\LinesController::class, 'getBusstopLines']);
Route::post('lines-add-busstop', [App\Http\Controllers\API\LinesController::class, 'addBusstopLines']);

//Edytor służb API
Route::get('stints-get-all', [App\Http\Controllers\API\StintsController::class, 'getAllStints']);
// Route::get('lines-get-busstop/{lines}/{day}', [App\Http\Controllers\API\LinesController::class, 'getBusstopLines']);
// Route::post('lines-add-busstop', [App\Http\Controllers\API\LinesController::class, 'addBusstopLines']);

//Edytor brygad służb API
Route::get('stints-brigades-get-all/{stints}', [App\Http\Controllers\API\StintsController::class, 'getAllBrigadesofStints']);

//Edytor kursów
Route::get('editor-getAllRoutes/{brigades}', [App\Http\Controllers\API\StintsController::class, 'getAllRoutesofBrigade']);
// Route::get('lines-get-busstop/{lines}/{day}', [App\Http\Controllers\API\LinesController::class, 'getBusstopLines']);
// Route::post('lines-add-busstop', [App\Http\Controllers\API\LinesController::class, 'addBusstopLines']);

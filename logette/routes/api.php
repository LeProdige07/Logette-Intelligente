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

// Public Routes
Route::post('/', [App\Http\Controllers\LogetteApiController::class, 'logette']);
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);
Route::get('/logettes', [App\Http\Controllers\LogetteApiController::class, 'index']);
Route::get('/logettes/{id}', [App\Http\Controllers\LogetteApiController::class, 'show']);
Route::get('/logettes/search/{libelle}', [App\Http\Controllers\LogetteApiController::class, 'search']);

// Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logettes', [App\Http\Controllers\LogetteApiController::class, 'store']);
    Route::put('/logettes/{id}', [App\Http\Controllers\LogetteApiController::class, 'update']);
    Route::delete('/logettes/{id}', [App\Http\Controllers\LogetteApiController::class, 'delete']);
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout']);
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


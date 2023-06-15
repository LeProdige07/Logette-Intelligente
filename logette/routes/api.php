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


// Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    // Logettes
    Route::get('/logettes', [App\Http\Controllers\LogetteApiController::class, 'index']);
    Route::get('/logettes/{id}', [App\Http\Controllers\LogetteApiController::class, 'show']);
    Route::get('/logettes/search/{libelle}', [App\Http\Controllers\LogetteApiController::class, 'search']);
    Route::post('/logettes', [App\Http\Controllers\LogetteApiController::class, 'store']);
    Route::put('/logettes/{id}', [App\Http\Controllers\LogetteApiController::class, 'update']);
    Route::delete('/logettes/{id}', [App\Http\Controllers\LogetteApiController::class, 'delete']);
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout']);

    // Puissances
    Route::get('/logette/{id}/puissances', [App\Http\Controllers\PuissanceController::class, 'index']);
    Route::post('/logette/{id}/puissances', [App\Http\Controllers\PuissanceController::class, 'store']);

    // Tensions
    Route::get('/logette/{id}/tensions', [App\Http\Controllers\TensionController::class, 'index']);
    Route::post('/logette/{id}/tensions', [App\Http\Controllers\TensionController::class, 'store']);

    // Energies
    Route::get('/logette/{id}/energies', [App\Http\Controllers\EnergieController::class, 'index']);
    Route::post('/logette/{id}/energies', [App\Http\Controllers\EnergieController::class, 'store']);

    // Courants
    Route::get('/logette/{id}/courants', [App\Http\Controllers\CourantController::class, 'index']);
    Route::post('/logette/{id}/courants', [App\Http\Controllers\CourantController::class, 'store']);
});



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

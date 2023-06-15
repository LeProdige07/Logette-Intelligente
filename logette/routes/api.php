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

    // Api for take logettes of user authenticated
    Route::get('/logettes_by_user', [App\Http\Controllers\LogetteApiController::class, 'logettes_by_user']);

    // Logettes
    Route::get('/logettes', [App\Http\Controllers\LogetteApiController::class, 'index']);
    Route::get('/logettes/{id}', [App\Http\Controllers\LogetteApiController::class, 'show']);
    Route::get('/logettes/search/{libelle}', [App\Http\Controllers\LogetteApiController::class, 'search']);
    Route::post('/logettes', [App\Http\Controllers\LogetteApiController::class, 'store']);
    Route::put('/logettes/{id}', [App\Http\Controllers\LogetteApiController::class, 'update']);
    Route::delete('/logettes/{id}', [App\Http\Controllers\LogetteApiController::class, 'delete']);

    // Api for logout a user authenticated
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout']);

    // Api for take puissances of a logette : Mobile part
    Route::get('/logette/{id}/puissances', [App\Http\Controllers\PuissanceController::class, 'index']);
    
    // Api for post puissances of a logette : Electronic part
    Route::post('/logette/{id}/puissances', [App\Http\Controllers\PuissanceController::class, 'store']);

    // Api for take tensions of a logette : Mobile part
    Route::get('/logette/{id}/tensions', [App\Http\Controllers\TensionController::class, 'index']);
    
    // Api for post tensions of a logette : Electronic part
    Route::post('/logette/{id}/tensions', [App\Http\Controllers\TensionController::class, 'store']);

    // Api for take energies of a logette : Mobile part
    Route::get('/logette/{id}/energies', [App\Http\Controllers\EnergieController::class, 'index']);
    
    // Api for post energies of a logette : Electronic part
    Route::post('/logette/{id}/energies', [App\Http\Controllers\EnergieController::class, 'store']);

    // Api for take courants of a logette : Mobile part
    Route::get('/logette/{id}/courants', [App\Http\Controllers\CourantController::class, 'index']);
    
    // Api for post courants of a logette : Electronic part
    Route::post('/logette/{id}/courants', [App\Http\Controllers\CourantController::class, 'store']);
    
    // Api for take humidities of a logette : Mobile part
    Route::get('/logette/{id}/humidities', [App\Http\Controllers\HumidityController::class, 'index']);
    
    // Api for post humidities of a logette : Electronic part
    Route::post('/logette/{id}/humidities', [App\Http\Controllers\HumidityController::class, 'store']);
    
    // Api for take temperatures of a logette : Mobile part
    Route::get('/logette/{id}/temperatures', [App\Http\Controllers\TemperatureController::class, 'index']);
    
    // Api for post temperatures of a logette : Electronic part
    Route::post('/logette/{id}/temperatures', [App\Http\Controllers\TemperatureController::class, 'store']);

    // Api for post state(Etat) of a logette : Mobile part
    Route::post('/logette/{id}/etat', [App\Http\Controllers\LogetteApiController::class, 'etat_logette']);
    
    // Api for take state(Etat) of a logette : Electronic part
    Route::get('/logette/{id}/etat', [App\Http\Controllers\LogetteApiController::class, 'etat_status']);
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

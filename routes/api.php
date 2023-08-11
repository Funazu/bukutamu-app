<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BukuTamuController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/v1/bukutamu', [BukuTamuController::class, 'getAllData']);
Route::get('/v1/bukutamu/{bukutamu:uniqid}', [BukuTamuController::class, 'getDataByUniqid']);
Route::post('/v1/bukutamu/create', [BukuTamuController::class, 'createData']);
Route::put('/v1/bukutamu/update/{bukutamu:uniqid}', [BukuTamuController::class, 'updateData']);
Route::post('/v1/bukutamu/delete/{bukutamu:uniqid}', [BukuTamuController::class, 'deleteData']);
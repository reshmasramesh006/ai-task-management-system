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

use App\Http\Controllers\Api\TaskApiController;

Route::get('/tasks', [TaskApiController::class, 'index']);

Route::post('/tasks', [TaskApiController::class, 'store']);

Route::patch(
    '/tasks/{id}/status',
    [TaskApiController::class, 'updateStatus']
);

Route::get(
    '/tasks/{id}/ai-summary',
    [TaskApiController::class, 'aiSummary']
);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

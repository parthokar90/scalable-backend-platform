<?php 

use App\Http\Controllers\Api\V1\UserController;

Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
    Route::apiResource('users', UserController::class);
});


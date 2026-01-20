<?php 

use App\Http\Controllers\Api\V1\UserController;

Route::prefix('v1')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
});

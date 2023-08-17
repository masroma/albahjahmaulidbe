<?php


use App\Http\Controllers\Api\TransaksinController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');
});

Route::post('/transaksi', [TransaksinController::class, 'store']);
Route::post('/transaksi/notification', [TransaksinController::class, 'notificationHandler']);

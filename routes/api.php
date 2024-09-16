<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//api/v1
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1','middleware' => 'auth:sanctum'], function() {
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('transactions', TransactionController::class);
    Route::apiResource('payments', PaymentController::class);
    Route::apiResource('accounts', AccountController::class);
    Route::apiResource('cards', CardController::class);
    Route::apiResource('loans', LoanController::class);

    Route::Post('transactions/bulk', ['uses'=>'TransactionController@bulkStore']);
});

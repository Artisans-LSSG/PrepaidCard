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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/parents',\App\Http\Controllers\ParentUserController::class);
Route::resource('/childs',\App\Http\Controllers\ChildUserController::class);
Route::resource('/cards',\App\Http\Controllers\CardController::class);

Route::get('/parent/transaction/{id}',[\App\Http\Controllers\ParentUserController::class,'showtransaction']);
Route::get('/parent/child/{id}',[\App\Http\Controllers\ParentUserController::class,'showchild']);
Route::post('/parent/child',[\App\Http\Controllers\ParentUserController::class,'storechild']);


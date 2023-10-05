<?php

use App\Http\Controllers\AuthController as AuthControllerAlias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('register', [AuthControllerAlias::class, 'register']);
    Route::post('login', [AuthControllerAlias::class, 'login'])->name('login');
    Route::post('logout', [AuthControllerAlias::class. 'logout']);
    Route::post('refresh', [AuthControllerAlias::class, 'refresh']);
    Route::post('me', [AuthControllerAlias::class, 'me']);
});

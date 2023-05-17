<?php

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

Route::post('/oauth/token', [\Laravel\Passport\Http\Controllers\AccessTokenController::class, 'issueToken'])->name('token');
Route::group(['middleware' => 'auth:api'], function () {
    Route::resource('job', \App\Http\Controllers\JobController::class)->except(['edit', 'create']);
    Route::resource('user', \App\Http\Controllers\UserController::class)->except(['edit', 'create']);
});
Route::group(['as' => 'job.', 'prefix' => 'job'], function () {
    Route::get('/locations', [\App\Http\Controllers\JobController::class, 'getLocations'])->name('get-locations');
    Route::get('/industries', [\App\Http\Controllers\JobController::class, 'getIndustries'])->name('get-industries');
});

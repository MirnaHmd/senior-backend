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
Route::post('user', [\App\Http\Controllers\UserController::class, 'store'])->name('store');

Route::group(['as' => 'job.', 'prefix' => 'job'], function () {
    Route::get('', [\App\Http\Controllers\JobController::class, 'index'])->name('index');
    Route::get('/locations', [\App\Http\Controllers\JobController::class, 'getLocations'])->name('get-locations');
    Route::get('/industries', [\App\Http\Controllers\JobController::class, 'getIndustries'])->name('get-industries');
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::resource('job', \App\Http\Controllers\JobController::class)->except(['edit', 'create','index']);
    Route::get('user/role',[\App\Http\Controllers\UserController::class, 'getRole'])->name('role');
    Route::resource('user', \App\Http\Controllers\UserController::class)->except(['edit', 'create', 'store']);
    Route::get('user-jobs', [\App\Http\Controllers\JobController::class, 'getUserJobs'])->name('user-jobs');
    Route::get('applied-jobs', [\App\Http\Controllers\JobController::class, 'getAppliedJobs'])->name('applied-jobs');
    Route::post('file_upload', [\App\Http\Controllers\fileUploadController::class, 'fileUpload'])->name('file-upload');
});


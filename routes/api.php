<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LimsController;
use App\Http\Controllers\WhonetController;
use App\Http\Controllers\AmuController;
use App\Http\Controllers\IoTController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\CollectionTypeController;

Route::post('/lims', [LimsController::class, 'store']);
Route::post('/whonet', [WhonetController::class, 'upload']);
Route::post('/amu', [AmuController::class, 'store']);
Route::post('/iot', [IoTController::class, 'store']);
Route::post('/tracking', [TrackingController::class, 'update']);
Route::get('/facilities', [TrackingController::class, 'facilities']);
Route::get('/collection-types', [CollectionTypeController::class, 'index']);
Route::get('/sample-types/{id}', [CollectionTypeController::class, 'sampleTypes']);
<?php

use App\Http\Controllers\ClaimController;
use App\Http\Controllers\FileController;
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

// Claim Route
Route::post('claim-all', [ClaimController::class, 'index']);
Route::post('claim-store', [ClaimController::class, 'store']);
Route::post('claim-update', [ClaimController::class, 'update']);

//File Route
Route::post('file-store', [FileController::class, 'store']);

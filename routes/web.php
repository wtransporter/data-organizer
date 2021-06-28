<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\CandidateProjectController;
use App\Http\Controllers\CandidateTechnologyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    Route::get('/dashboard', [CandidateController::class, 'index'])->name('dashboard');
    Route::resource('candidates', CandidateController::class);
    Route::resource('technologies', TechnologyController::class);
    Route::resource('candidates.technologies', CandidateTechnologyController::class)->only('store');
    Route::resource('candidates.projects', CandidateProjectController::class);
});

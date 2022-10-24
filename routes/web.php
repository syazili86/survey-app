<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Enroll;
use App\Http\Controllers\Report;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'index']);
Route::post('/', [LoginController::class, 'doAuth']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::group(['middleware'=>['StudentAuth']], function(){
  Route::get('/enrol', [Enroll::class, 'index']);
  Route::post('/enrol', [Enroll::class, 'doSurvey']);
});

Route::group(['middleware'=>['AdminAuth']], function(){
  Route::get('/report', [Report::class, 'index']);
  Route::get('/report/{id}/detail', [Report::class, 'detail']);
});
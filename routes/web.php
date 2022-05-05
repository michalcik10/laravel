<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;

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




Route::get('/postMore',[PersonController::class,'postNames']);
Route::post('/post',[PersonController::class,'post']);
Route::delete('/deleteAll',[PersonController::class,'deleteAll']);
Route::delete('/delete/{id}',[PersonController::class,'delete']);
Route::put('/update/{id}',[PersonController::class,'update']);
Route::get("/user",);

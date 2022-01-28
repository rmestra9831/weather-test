<?php

use App\Http\Controllers\RecordSearchController;
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

Route::get('/', function () {return view('home');});

Route::get('/records', [RecordSearchController::class, 'index'])->name('records');
Route::post('saveSearch', [RecordSearchController::class ,'saveSearch'])->name('record.save');
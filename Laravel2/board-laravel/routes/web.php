<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

use App\Http\Controllers\BoardController;
Route::get('/',[BoardController::class, 'index'])->name('board.index');
Route::get('/board',[BoardController::class, 'list'])->name('board.list');
Route::get('/create',[BoardController::class, 'create'])->name('board.create');
<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/workspace/store', [App\Http\Controllers\WorkspaceController::class, 'store'])->name('workspace.store');

Route::get('/task/show', [App\Http\Controllers\TaskController::class, 'show'])->name('task.show');
Route::post('/task/store', [App\Http\Controllers\TaskController::class, 'store'])->name('task.store');



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
Route::get('/workspace/show/{workspace:uuid}', [App\Http\Controllers\WorkspaceController::class, 'show'])->name('workspace.show');
Route::get('/workspace/delete/{workspace}', [App\Http\Controllers\WorkspaceController::class, 'delete'])->name('workspace.delete');
Route::get('/workspace/edit/{workspace:uuid}', [App\Http\Controllers\WorkspaceController::class, 'edit'])->name('workspace.edit');
Route::post('/workspace/update/{workspace}', [App\Http\Controllers\WorkspaceController::class, 'update'])->name('workspace.update');

Route::post('/task/store/{workspace}', [App\Http\Controllers\TaskController::class, 'store'])->name('task.store');
Route::get('/task/delete/{workspace}/{task}', [App\Http\Controllers\TaskController::class, 'delete'])->name('task.delete');
Route::get('/task/edit/{workspace:uuid}/{task}', [App\Http\Controllers\TaskController::class, 'edit'])->name('task.edit');
Route::post('/task/update/{workspace}/{task}', [App\Http\Controllers\TaskController::class, 'update'])->name('task.update');

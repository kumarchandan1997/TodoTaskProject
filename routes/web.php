<?php

use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\TodoController;

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

Route::get('/home', [TodoController::class, 'index'])->name('home');
Route::get('/emaildata', [TodoController::class, 'emaildata']);
Route::get('createtodo', [TodoController::class, 'create']);
Route::post('/store', [TodoController::class, 'store'])->name('todo.store');
Route::delete('/todo/{id}', [TodoController::class, 'deleteTodo']);
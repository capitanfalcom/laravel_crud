<?php

use App\Http\Controllers\TodosController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/app', function () {
    return view('app');
})->name('app');




Route::get('/tareas', [TodosController::class, 'index'])->name('tareas');
Route::post('/tareas', [TodosController::class, 'store'])->name('tareas');

Route::get('/tareas/{id}', [TodosController::class, 'show'])->name('tareas-show');
Route::patch('/tareas/{id}', [TodosController::class, 'update'])->name('tareas-update');
Route::delete('/tareas/{id}', [TodosController::class, 'destroy'])->name('tareas-destroy');


Route::get('/categoria', function () {
    return view('categoria.index');
});


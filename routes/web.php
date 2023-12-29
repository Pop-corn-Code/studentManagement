<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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
Route::get('add-std', function(){
    return view('add-std-form');
})->name('add.std');
Route::post('/add-std-info', [StudentController::class, 'store'])->name("std.store");
Route::get('/students', [StudentController::class, 'index'])->name('students');
Route::get('/edit-std/{id}', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/update-std/{student}', [StudentController::class, 'update'])->name('students.update');
Route::get('/dlt-std/{id}', [StudentController::class, 'delete'])->name('students.dlt');

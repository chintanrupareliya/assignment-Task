<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('/tasks')->group(function(){
    Route::get('/',[TaskController::class,'index'])->name('tasks.index');
    Route::get('/create',[TaskController::class,'create'])->name('tasks.create');
    Route::post('/',[TaskController::class,'store'])->name('tasks.store');
    Route::get('/{task}',[TaskController::class,'show'])->name('tasks.show');
    Route::get('/{task}/edit',[TaskController::class,'edit'])->name('tasks.edit');
    Route::put('/{task}',[TaskController::class,'update'])->name('tasks.update');
    Route::delete('/{task}',[TaskController::class,'destroy'])->name('tasks.destroy');

});
require __DIR__.'/auth.php';

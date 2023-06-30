<?php

use App\Http\Controllers\DrinkableController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TabletController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/tablets',[TabletController::class,'index'])->name('tablets.index');
Route::get('/tablets/create',[TabletController::class,'create'])->name('tablets.create');
Route::post('/tablets/store',[TabletController::class,'store'])->name('tablets.store');

Route::get('/drinkables',[DrinkableController::class,'index'])->name('drinkables.index');
Route::get('/drinkables/create',[DrinkableController::class,'create'])->name('drinkables.create');
Route::post('/drinkables/store',[DrinkableController::class,'store'])->name('drinkables.store');

Route::get('/drinkables/show/{id}',[DrinkableController::class,'show'])->name('drinkables.show');
Route::get('/drinkables/edit/{id}',[DrinkableController::class,'edit'])->name('drinkables.edit');
Route::put('/drinkables/update/{id}',[DrinkableController::class,'update'])->name('drinkables.update');
Route::delete('/drinkables/destroy/{id}',[DrinkableController::class,'destroy'])->name('drinkables.destroy');

Route::get('/tablets/show/{id}',[TabletController::class, 'show'])->name('tablets.show');
Route::get('/tablets/edit/{id}',[TabletController::class, 'edit'])->name('tablets.edit');
Route::put('/tablets/update/{id}',[TabletController::class, 'update'])->name('tablets.update');
Route::delete('/tablets/destroy/{id}',[TabletController::class, 'destroy'])->name('tablets.destroy');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

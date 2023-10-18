<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\borrowerInfoController;


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

Route::get('/borrower', [borrowerInfoController::class, 'index'])
->middleware(['auth', 'verified'])
->name('borrower');

Route::get('/borrower/create', function () {
    return view('borrower.create');
})->middleware(['auth', 'verified'])->name('add-borrower');

Route::post('/borrower/create', [borrowerInfoController::class, 'store'])
->middleware(['auth', 'verified'])
->name('borrower-store');

Route::delete('/borrower/delete/{brno}', [borrowerInfoController::class, 'destroy'])
   ->middleware(['auth', 'verified'])
   ->name('borrower-delete');

Route::get('/students/edit/{brno}', [borrowerInfoController::class, 'edit'])
->middleware(['auth', 'verified'])
->name('borrower-edit');

Route::patch('/students/update/{brno}', [borrowerInfoController::class, 'update'])
   ->middleware(['auth', 'verified'])
   ->name('borrower-update');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

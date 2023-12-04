<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\borrowerInfoController;
use App\Http\Controllers\loanInfoController;
use App\Http\Controllers\officerInfoController;
use App\Http\Controllers\loansettingsController;
use App\Http\Controllers\DashboardController;

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
    return view('auth/login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


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

Route::get('/borrower/edit/{brno}', [borrowerInfoController::class, 'edit'])
->middleware(['auth', 'verified'])
->name('borrower-edit');

Route::get('/borrower/view/{brno}', [borrowerInfoController::class, 'show'])
->middleware(['auth', 'verified'])
->name('borrower-view');

Route::patch('/borrower/update/{brno}', [borrowerInfoController::class, 'update'])
   ->middleware(['auth', 'verified'])
   ->name('borrower-update');



// LOAN OFFICER SETTINGS

Route::get('/Officer', [officerInfoController::class, 'index'])
->middleware(['auth', 'verified'])
->name('officer');

Route::get('/Officer/create', function () {
    return view('Officer.create');
})->middleware(['auth', 'verified'])->name('add-officer');

Route::post('/Officer/create', [officerInfoController::class, 'store'])
->middleware(['auth', 'verified'])
->name('Officer-store');

Route::get('/Officer/edit/{ofno}', [officerInfoController::class, 'edit'])
->middleware(['auth', 'verified'])
->name('officer-edit');

Route::patch('/Officer/update/{ofno}', [officerInfoController::class, 'update'])
   ->middleware(['auth', 'verified'])
   ->name('officer-update');

   Route::delete('/Officer/delete/{ofno}', [officerInfoController::class, 'destroy'])
   ->middleware(['auth', 'verified'])
   ->name('officer-delete');
// LOAN
Route::get('/Loan/match/{brno}', [loanInfoController::class, 'search'])
->middleware(['auth', 'verified'])
->name('search');


Route::get('/Loan', [loanInfoController::class, 'index'])
->middleware(['auth', 'verified'])
->name('Loan');

Route::get('/Loan/create', function () {
    return view('Loan.create');
})->middleware(['auth', 'verified'])->name('add-Loan');

Route::post('/Loan/create', [loanInfoController::class, 'store'])
->middleware(['auth', 'verified'])
->name('Loan-store'); 

Route::get('/Loan/create', [loanInfoController::class, 'getBorrowerInfo'])
->middleware(['auth', 'verified'])
->name('add-Loan');


Route::get('/Interest', [loansettingsController::class, 'interestdisplay'])
->middleware(['auth', 'verified'])
->name('interest');

Route::delete('/Interest/delete/{int}', [loansettingsController::class, 'destroy'])
   ->middleware(['auth', 'verified'])
   ->name('interest-delete');
   
Route::patch('/Interest/Update/{int}', [loansettingsController::class, 'update'])
   ->middleware(['auth', 'verified'])
   ->name('update-interest'); 


/////////////////


Route::get('/Loan/newloan', [loanInfoController::class, 'newloan'])
->middleware(['auth', 'verified'])
->name('new-loan');

Route::get('/Loan/newloan/{lno}', [loanInfoController::class, 'StatusApprove'])
->middleware(['auth', 'verified'])
->name('loan-Approve');

Route::get('/Loan/newloan/reject/{lno}', [loanInfoController::class, 'StatusReject'])
->middleware(['auth', 'verified'])
->name('loan-Reject');

Route::get('/Loan/rejected', [loanInfoController::class, 'rejected'])
->middleware(['auth', 'verified'])
->name('rejected-loan');

Route::get('/Loan/approved', [loanInfoController::class, 'approved'])
->middleware(['auth', 'verified'])
->name('approved-loan');

Route::get('/Loan/approved/{lno}', [loanInfoController::class, 'Released'])
->middleware(['auth', 'verified'])
->name('loan-Release');


Route::get('/Loan/List', [loanInfoController::class, 'paid'])
->middleware(['auth', 'verified'])
->name('paid-loan');

Route::get('/Loan/interest', [loansettingsController::class, 'Interest'])
->middleware(['auth', 'verified'])
->name('add-interest');


Route::get('/Loan/payment', [loanInfoController::class, 'payment'])
->middleware(['auth', 'verified'])
->name('payment');



////////// payment


Route::post('/borrower/payment', [borrowerInfoController::class, 'borrowerpay'])
->middleware(['auth', 'verified'])
->name('borrower-pay');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

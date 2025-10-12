<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\ResponderController;
use App\Http\Controllers\WishesController;
use App\Http\Controllers\AuthController;

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

// Route::get('/', function () {
//     return view('invitation');
//     // return view('welcome');
// });

Route::get('/', [InvitationController::class, 'index'])->name('invitation.index');
Route::get('/invitation', [InvitationController::class, 'index']);
Route::get('/invitation/{uuid}', [InvitationController::class, 'show']);

Route::post('/submit-rsvp', [ResponderController::class, 'submit'])->name('submit-rsvp');
Route::post('/submitnew-rsvp', [ResponderController::class, 'submitnew'])->name('submitnew-rsvp');
Route::post('/submit-wishes', [WishesController::class, 'submit'])->name('submit-wishes');

// Responder Controller
Route::middleware(['auth'])->group(function () {
    Route::get('/responder', [ResponderController::class, 'create'])->name('responder');
    Route::post('/addnewresponder', [ResponderController::class, 'store'])->name('addnewresponder');
    Route::get('/responder/edit/{id}', [ResponderController::class, 'edit'])->name('responder.edit');
    Route::post('/responder/update/{id}', [ResponderController::class, 'update'])->name('responder.update');
});

// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


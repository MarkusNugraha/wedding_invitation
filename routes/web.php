<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\ResponderController;
use App\Http\Controllers\WishesController;

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

// Route::get('/invitation', function () {
//     return view('invitation');
// });

Route::get('/', [InvitationController::class, 'index'])->name('invitation.index');
Route::get('/invitation', [InvitationController::class, 'index']);
Route::get('/invitation/to/{id}', [InvitationController::class, 'show']);



Route::post('/submit-rsvp', [ResponderController::class, 'submit'])->name('submit-rsvp');
Route::post('/submitnew-rsvp', [ResponderController::class, 'submitnew'])->name('submitnew-rsvp');
Route::post('/submit-wishes', [WishesController::class, 'submit'])->name('submit-wishes');


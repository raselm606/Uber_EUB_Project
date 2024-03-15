<?php

use App\Http\Controllers\AuthRiderUser;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\rider\BookaRideController;
use App\Http\Controllers\VerificationController;
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

//homepage
Route::get('/', [FrontendController::class, 'Home'])->name('home');
//signup
Route::get('signup', [AuthRiderUser::class, 'index'])->name('signup');
Route::post('signup', [AuthRiderUser::class, 'register'])->name('signup');
//login and logout
Route::get('login', [AuthRiderUser::class, 'login'])->name('login');
Route::post('login', [AuthRiderUser::class, 'loginSubmit'])->name('login_submit');
Route::post('logout', [AuthRiderUser::class, 'logout'])->name('logout');
//email verification
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/verify/{code}', [VerificationController::class, 'verify'])->name('verify');

//Rider dashboard
Route::middleware(['auth', 'verified'])->group(function () {
    //all users
    Route::get('all-users', [BookaRideController::class, 'alluser'])->name('users');
    //book a ride request
    Route::get('book', [BookaRideController::class, 'index'])->name('bookaride');
    Route::post('book', [BookaRideController::class, 'bookRequest'])->name('bookaride');

    //rider dashboard
    Route::get('my-driver', [BookaRideController::class, 'myDriver'])->name('mydriver');
    Route::post('my-driver/{id}/accept', [BookaRideController::class, 'rideAccept'])->name('update.status.accept');
    Route::post('my-driver/{id}/decline', [BookaRideController::class, 'rideDecline'])->name('update.status.decline');
});



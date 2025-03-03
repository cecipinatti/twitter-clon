<?php

use App\Http\Controllers\ProfileController;
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
    /* return view('welcome'); */
    // redirección por default
    return redirect('/tweets');
});


Route::get('/dashboard', function () {
    /* return view('dashboard'); */
    return redirect('/tweets');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // users
    Route::get('user/{user}', [
        App\Http\Controllers\UserController::class, 'profile'
    ])->name('user.profile');

});


require __DIR__.'/auth.php';
require __DIR__.'/tweets.php';



<?php
use Illuminate\Support\Facades\Route;

/*
    Route::get('/', function () {
        return view('index');
    });
*/

    Route::get('/tweets', [
        App\Http\Controllers\TweetsController::class, 'index'
    ])->name('tweets');

    Route::middleware('auth')->group(function()
{
    // Acciones manejadas por el controlador de recursos
    // tweets
    Route::get('/tweets/create', [
        App\Http\Controllers\TweetsController::class, 'create'
    ])->name('tweets.create');


    Route::post('/tweets', [
        App\Http\Controllers\TweetsController::class, 'store'
    ])->name('tweets.store');


    // edición
    Route::get('/tweets/edit/{tweet}', [
        App\Http\Controllers\TweetsController::class, 'edit'
    ])->name('tweets.edit');

    Route::put('/tweets/{tweet}', [
        App\Http\Controllers\TweetsController::class, 'update'
    ])->name('tweets.update');

    // confirmar eliminación
    Route::get('/tweets/delete/{tweet}', [
        App\Http\Controllers\TweetsController::class, 'delete'
    ])->name('tweets.delete');

    Route::delete('/tweets/{tweet}', [
        App\Http\Controllers\TweetsController::class, 'destroy'
    ])->name('tweets.destroy');



    // replies
    Route::get('/tweets/{tweet}/reply/create', [
        App\Http\Controllers\RepliesController::class, 'create'
    ])->name('reply.create');

    Route::post('/tweets/{tweet}/reply/store', [
        App\Http\Controllers\RepliesController::class, 'store'
    ])->name('reply.store');

    // edición
    Route::get('/replies/edit/{reply}', [
        App\Http\Controllers\RepliesController::class, 'edit'
    ])->name('reply.edit');

    Route::put('/replies/{reply}', [
        App\Http\Controllers\RepliesController::class, 'update'
    ])->name('reply.update');

    // confirmar eliminación
    Route::get('/replies/delete/{reply}', [
        App\Http\Controllers\RepliesController::class, 'delete'
    ])->name('reply.delete');

    Route::delete('/replies/{reply}', [
        App\Http\Controllers\RepliesController::class, 'destroy'
    ])->name('reply.destroy');

});


<?php

use App\Http\Controllers\Auth\UserController;
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

Route::fallback(function () {
    //return view('errors.404');
    if (env('ONLY_SSL') == true)
        return redirect()->secure('/');
    return redirect('/');
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'delete')->name('profile.destroy');
    });

    Route::controller(UserController::class)->group(function() {
       Route::get('/users', 'index')->name('users');
       Route::get('/users/create', 'create')->name('users.create');
       Route::post('/users', 'store')->name('users.store');
       Route::patch('/users/{user}', 'edit')->name('users.edit');
       Route::post('/users/{user}', 'destroy')->name('users.destroy');
    });

});


require __DIR__ . '/auth.php';

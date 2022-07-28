<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.action');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



Route::group([
    'middleware' => "auth:sanctum"
], function () {
    Route::get('/', function () {
        return redirect()->route(auth()->check() ? 'dashboard': 'login');
    });

    Route::get('/dashboard', function () {
        return Inertia::render('Welcome', [
            'user' => auth()->user() ? [
                'id' => auth()->user()->id,
                'name' => auth()->user()->name
            ]: null
        ]);
    })->name('dashboard');


    Route::get('/users', [
        UserController::class,
        'index'
    ])->name('user.index');

    Route::get('/users/+', [
        UserController::class,
        'create'
    ])->name('user.create');

    Route::post('/users/+', [
        UserController::class,
        'store'
    ])->name('user.store');

    Route::get('/users/{user}/edit', [
        UserController::class,
        'create'
    ])->name('user.edit');

    Route::post('/users/{user}/edit', [
        UserController::class,
        'update'
    ])->name('user.update');

    Route::delete('/users/{user}', [
        UserController::class,
        'delete'
    ])->name('user.delete');
});

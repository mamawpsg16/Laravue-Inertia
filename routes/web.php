<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


Route::middleware(['auth'])->group(function () {
    Route::get('/about', function () {
        return Inertia::render('about');
    })->name('about');
    //Logout
    Route::post('/logout',[UserController::class,'logout'])->name('auth.logout');
});

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

//Create New User 
Route::post('/createUser',[UserController::class,'store'])->name('auth.store');
//Show Register Form
Route::get('/register',[UserController::class,'create'])->name('auth.create');

//Show Login Form
Route::get('/login',[UserController::class,'login'])->name('auth.login');
//Authenticate User
Route::post('/authenticate',[UserController::class,'authenticate'])->name('auth.authenticate');
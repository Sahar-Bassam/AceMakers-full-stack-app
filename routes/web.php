<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::middleware('auth')->group(function(){
    
    Route::inertia('/dashboard' , 'Dashboard',['users' => User::paginate(5)])->name('dashboard');
    
    Route::post('/logout',[AuthController::class, 'logout'])->name('logout');

    Route::inertia('/' , 'Home')->name('Home');
    
    Route::inertia('/colors' , 'ColorChanger')->name('colors');

 
});

Route::middleware('guest')->group(function(){

Route::inertia('/register' , 'Auth/Register')->name('register');

Route::post('register',[AuthController::class, 'register']);

Route::inertia('/login' , 'Auth/Login')->name('login');

Route::post('/login',[AuthController::class, 'login']);


});


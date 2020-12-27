<?php

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

Route::get('/', [\App\Http\Controllers\UserController::class,'loginForm'])->name('main');


Route::resource('continent',\App\Http\Controllers\ContinentController::class)->middleware(['auth']);
Route::resource('country',\App\Http\Controllers\CountryController::class)->middleware(['auth']);
Route::resource('state',\App\Http\Controllers\StateController::class)->middleware(['auth']);
Route::resource('city',\App\Http\Controllers\CityController::class)->middleware(['auth']);



Route::get('login',[\App\Http\Controllers\UserController::class,'loginForm'])->name('login');
Route::post('login',[\App\Http\Controllers\UserController::class,'login'])->name('login');
Route::get('logout',[\App\Http\Controllers\UserController::class,'logout'])->name('logout');


Route::get('create-default-user',function(){

    $email = 'admin@domain.com';

    if (\App\Models\User::where('email',$email)->exists()){
        return 'User already created!';
    }

    $user = new \App\Models\User;

    $user->email = $email;
    $user->name = 'Admin';
    $user->password = Hash::make('admin');
    $user->save();

    return 'New User created.';

});
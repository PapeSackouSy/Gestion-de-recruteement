<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenficationControlleur;
Route::get('/', function () {
    return view('layout');
});
Route::get('/login',[AuthenficationControlleur::class,'LoginAfficher'])->name('login');
Route::get('/register',[AuthenficationControlleur::class,'RegisterAfficher'])->name('register');

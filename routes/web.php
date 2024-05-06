<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenficationControlleur;
use App\Http\Controllers\ProjetConntrolleur;
Route::get('/', function () {
    return view('layout');
});
Route::get('/login',[AuthenficationControlleur::class,'LoginAfficher'])->name('login');
Route::get('/register',[AuthenficationControlleur::class,'RegisterAfficher'])->name('register');
Route::post('register',[ProjetConntrolleur::class,'Recuper'])->name('registerApp');
Route::post('/login',[ProjetConntrolleur::class,'authenticate'])->name('authentifier');

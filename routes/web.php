<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenficationControlleur;
use App\Http\Controllers\ProjetConntrolleur;
Route::get('/', function () {
    return view('layout');
})->name('layout');
Route::get('/login',[AuthenficationControlleur::class,'LoginAfficher'])->name('login');
Route::get('/register',[AuthenficationControlleur::class,'RegisterAfficher'])->name('register');
Route::post('register',[ProjetConntrolleur::class,'Recuper'])->name('registerApp');
Route::post('/login',[ProjetConntrolleur::class,'authenticate'])->name('authentifier');
Route::get('/dashboard',[AuthenficationControlleur::class,'dashboard'])->name('dash');
Route::post('/logout', [ProjetConntrolleur::class, 'logout'])->name('logout');
Route::get('/ufr',[AuthenficationControlleur::class,'VueUFR'])->name('ufr');
Route::get('/ufr', [ProjetConntrolleur::class, 'VueUFR'])->name('ufr');
Route::post('ufr/Ajouter',[ProjetConntrolleur::class, 'store'])->name('ajouterufr');
Route::get('ufr/afficher',[ProjetConntrolleur::class,'Afficher'])->name('afficher');
Route::get('ufr/{id}/Editer',[ProjetConntrolleur::class,'EditerUfr'])->name('editerufr');
Route::get('ufr/{id}/Supprimer',[ProjetConntrolleur::class,'supprimerUfr'])->name('DropUfr');
Route::put('ufr/{id}/update',[ProjetConntrolleur::class,'UpdateUfr'])->name('updateUfr');

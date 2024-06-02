<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenficationControlleur;
use App\Http\Controllers\ProjetConntrolleur;
use App\Http\Controllers\DepartementControlleur;
use App\Http\Controllers\OffreControlleur;
use App\Http\Controllers\ProjetControlleurDRH;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\CandidatureControlleur;
Route::get('/', function () {
    return view('layout');
})->name('layout');
Route::get('/statistique', function () {
    return view('Template2.Statistic');
})->name('sta');

Route::get('/login',[AuthenficationControlleur::class,'LoginAfficher'])->name('login');
Route::get('/register',[AuthenficationControlleur::class,'RegisterAfficher'])->name('register');
Route::post('register',[ProjetConntrolleur::class,'Recuper'])->name('registerApp');
Route::post('/login',[ProjetConntrolleur::class,'authenticate'])->name('authentifier');

Route::middleware(['auth'])->group(function () {


Route::get('/dashboard',[AuthenficationControlleur::class,'dashboard'])->name('dash');
Route::get('/logout', [ProjetConntrolleur::class, 'logout'])->name('logout');
Route::get('/ufr',[AuthenficationControlleur::class,'VueUFR'])->name('ufr');
Route::get('/ufr', [ProjetConntrolleur::class, 'VueUFR'])->name('ufr');
Route::post('ufr/Ajouter',[ProjetConntrolleur::class, 'store'])->name('ajouterufr');
Route::get('ufr/afficher',[ProjetConntrolleur::class,'Afficher'])->name('afficher');
Route::get('ufr/{id}/Editer',[ProjetConntrolleur::class,'EditerUfr'])->name('editerufr');
Route::get('ufr/{id}/Supprimer',[ProjetConntrolleur::class,'supprimerUfr'])->name('DropUfr');
Route::put('ufr/{id}/update',[ProjetConntrolleur::class,'UpdateUfr'])->name('updateUfr');
Route::get('user/affiche',[ProjetConntrolleur::class,'AfficherUSERS'])->name('afficherUser');
Route::get('user/{id}/editer',[ProjetConntrolleur::class,'EditerUser'])->name('editeruser');
Route::put('user/{id}/update',[ProjetConntrolleur::class,'updateUser'])->name('updateUser');
Route::get('user/{id}/supprimer',[ProjetConntrolleur::class,'deleteApp'])->name('deleteApp');

Route::prefix('departement')->group(function () {
    Route::get('/Afficher', [DepartementControlleur::class,'AfficherDepartement'])->name('afficherDep');
    Route::post('/Ajouter',[DepartementControlleur::class,'AjouterDep'])->name('AjouterDep');
    Route::get('/listeDepartement',[DepartementControlleur::class,'listerDepartement'])->name('listeDep');
});
Route::prefix('DRH')->group(function(){
    Route::get('/Afficher',[ProjetControlleurDRH::class,'AfficherDRH'])->name('drhafficher');
    Route::post('/Ajouter',[ProjetControlleurDRH::class,'store'])->name('AjouterDRH');
});
Route::prefix('ViceRecteur')->group(function(){
    Route::get('/Afficher',[ProjetControlleurDRH::class,'AfficherVice'])->name('Viceafficher');
    Route::post('/Ajouter',[ProjetControlleurDRH::class,'storeVice'])->name('AjouterVice');
});
Route::prefix('offre')->group(function () {
    Route::get('/Afficherformulaire', [OffreControlleur::class,'index'])->name('AfficherOffres');
    Route::post('/Ajouter',[OffreControlleur::class,'store'])->name('AjouterOffre');
    Route::get('/listeOffre',[OffreControlleur::class,'show'])->name('listeOffre');
    Route::get('/{id}/AvisdeRecrutement',[PDFController::class,'modifyPDF'])->name('Avis');
    Route::get('/{id}/Editer',[OffreControlleur::class,'EditerOffre'])->name('EditerOffre');
    Route::post('/{id}/Update',[OffreControlleur::class,'update'])->name('UpdateOffre');
    Route::get('/{id}/Supprimer',[OffreControlleur::class,'destroy'])->name('deleteOffre');
    Route::get('/Afficher',[OffreControlleur::class,'AfficherCandidature'])->name('candidature');
    Route::get('{id}/postuler',[CandidatureControlleur::class,'index'])->name('Postuler');
    Route::post('{id}/postuler',[CandidatureControlleur::class,'store'])->name('AjouterPostuler');
});


});

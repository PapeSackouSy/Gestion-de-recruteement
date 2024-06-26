<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenficationControlleur;
use App\Http\Controllers\ProjetConntrolleur;
use App\Http\Controllers\DepartementControlleur;
use App\Http\Controllers\OffreControlleur;
use App\Http\Controllers\ProjetControlleurDRH;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\CandidatureControlleur;
use App\Http\Controllers\OffrePersControlleur;
use App\Http\Controllers\AvisControlleur;
use App\Http\Controllers\PersonnelControlleur;
use App\Http\Controllers\CommissionControlleur;
use App\Http\Controllers\MembreControlleur;
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
    Route::get('/Afficher',[OffreControlleur::class,'AfficherCandidature'])->name('candidature')->withoutMiddleware('auth');
    Route::get('{id}/postuler',[CandidatureControlleur::class,'index'])->name('Postuler');
    Route::post('{id}/postuler',[CandidatureControlleur::class,'store'])->name('AjouterPostuler');
});
Route::prefix('OffresPers')->group(function(){
      Route::get('/Affiche',[OffrePersControlleur::class,'index'])->name('indexPers');
      Route::post('/Ajouter',[OffrePersControlleur::class,'store'])->name('storePergs');
      Route::get('/AfficherOffre',[OffrePersControlleur::class,'show'])->name('listeOffresPers');
      Route::get('/{id}/Afficher',[OffrePersControlleur::class,'publish'])->name('affichierPub');
      Route::get('/{id}/editer',[OffrePersControlleur::class,'edit'])->name('editerOffrePers');
      Route::get('/listerOffres',[OffrePersControlleur::class,'create'])->name('listerROffres');
      Route::get('/{id}/editerPers',[OffrePersControlleur::class,'showEditer'])->name('showEditer');
      Route::put('/{id}/update',[OffrePersControlleur::class,'updateOffrePers'])->name('voirupdate');
      Route::get('/{id}/delete',[OffrePersControlleur::class,'destroy'])->name('deleterOffrepers');
      Route::get('/{id}/Avis',[PDFController::class,'GeneAvis'])->name('AvisPers');
    });
    Route::get('/publier/Afficher',[OffrePersControlleur::class,'indexp'])->name('affichieroffrepub');
    Route::prefix('Avis')->group(function(){
      Route::get('/{id}/Afficher',[AvisControlleur::class,'index'])->name('avis');
      Route::post('/{id}/AJouter',[AvisControlleur::class,'store'])->name('storeAvis');
      Route::get('/listerAvis',[AvisControlleur::class,'show'])->name('listeAvis');
      Route::get('/{id}/Editer',[AvisControlleur::class,'edit'])->name('editer');
      Route::put('/{id}/update',[AvisControlleur::class,'update'])->name('updateAvis');
      Route::get('/{id}/delete',[AvisControlleur::class,'destroy'])->name('deleterAvis');
    });
      Route::prefix('Personnel')->group(function(){
        Route::get('/{id}/postuler',[PersonnelControlleur::class,'Afficher'])->name('postulerPers');
        Route::post('/{id}/ajouter',[PersonnelControlleur::class,'store'])->name('postulerPersA');
      });
      Route::prefix('commission')->group(function(){
        Route::get('/Afficher',[CommissionControlleur::class,'index'])->name('afficherCommission');
        Route::post('/Create',[CommissionControlleur::class,'create'])->name('createCommission');
        Route::get('/lister',[CommissionControlleur::class,'show'])->name('showCommission');
        Route::get('/{id}/editer',[CommissionControlleur::class,'edit'])->name('editCommission');
        Route::put('/{id}/update',[CommissionControlleur::class,'update'])->name('updateCommissiom');
        Route::get('/{id}/delete',[CommissionControlleur::class,'destroy'])->name('destroyCommissiom');

      });
    Route::prefix('membre')->group(function(){
        Route::get('/afficher',[MembreControlleur::class,'index'])->name('affichermembre');
        Route::post('/create',[MembreControlleur::class,'create'])->name('createmembre');
        Route::get('/lister',[MembreControlleur::class,'show'])->name('showmembre');
        Route::get('/{id}/edit',[MembreControlleur::class,'edit'])->name('editmembre');
        Route::put('/{id}/update',[MembreControlleur::class,'update'])->name('updatemembre');
        Route::get('/{id}/delete',[MembreControlleur::class,'destroy'])->name('deletemembre');
    });
});

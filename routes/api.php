<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Avance\AvanceController;
use App\Http\Controllers\commande\CommandeController;
use App\Http\Controllers\Dechet\DechetController;
use App\Http\Controllers\fournisseur\FournisseurController;
use App\Http\Controllers\livraison\LivraisonController;
use App\Http\Controllers\payement\PayementController;
use App\Http\Controllers\sous_fournisseur\SousFournisseurController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


/**********************creation****************** */


Route::post('/create_livraison',[LivraisonController::class , 'store_livraison'])->name('store.livraison');
Route::post('/create_commande',[CommandeController::class , 'store_commande'])->name('store.commande');
Route::post('/create_fournisseur',[FournisseurController::class , 'store_fournisseur'])->name('store.fournisseur');
Route::post('/create_payement',[PayementController::class , 'store_payement'])->name('store.payement');
Route::post('/create_avance',[AvanceController::class , 'store_avance'])->name('store.avance');

Route::post('/create_sous_fournisseur',[SousFournisseurController::class , 'store_sous_fournisseur'])->name('store.sous_fournisseur');
//soit au traitement ou soit ici
Route::post('/create_dechet',[DechetController::class , 'store_dechet'])->name('store.dechet');
//


/**********************affichage********************** */
Route::get('/show_commande',[CommandeController::class , 'showCommande'])->name('show.commande');
Route::get('/show_commande_annule',[CommandeController::class , 'showCommandeAnnule'])->name('show.commandeannule');
Route::get('/show_commande_non_livre',[CommandeController::class , 'showCommandeNoLivre'])->name('show.commandenolivre');

Route::get('/show_fournisseur',[FournisseurController::class , 'showFournisseur'])->name('show.fournisseur');

Route::get('/show_avance',[AvanceController::class , 'showAvance'])->name('show.avance');

Route::get('/show_sous_fournisseur',[SousFournisseurController::class , 'showSousFournisseur'])->name('show.sous_fournisseur');
Route::get('/show_dechet',[DechetController::class , 'showDechet'])->name('show.dechet');
Route::get('/show_Livraison',[LivraisonController::class , 'showLivraison'])->name('show.livraison');
Route::get('/show_livraisonPaid',[LivraisonController::class , 'getPaid'])->name('show.paid');
Route::get('/show_livraisonUnpaid',[LivraisonController::class , 'getUnpaid'])->name('show.unpaid');

Route::get('/show_payement',[PayementController::class , 'showPayement'])->name('show.payement');

Route::get('/Show_lastIdCommande',[CommandeController::class , 'Show_lastIdCommande'])->name('show.lastId');

//****************************detail*******************************/

Route::get('/details_commande/{id}',[CommandeController::class , 'detailCommande'])->name('detail.commande');
Route::get('/details_livraison/{id}',[LivraisonController::class , 'detailLivraison'])->name('detail.livraison');
Route::get('/details_fournisseur/{id}',[FournisseurController::class , 'detailfournisseur'])->name('detail.fournisseur');
Route::get('/details_sous_fournisseur/{id}',[SousFournisseurController::class , 'detailSousFournisseur'])->name('detail.sous_fournisseur');
Route::get('/details_dechet/{id}',[DechetController::class , 'detailDechet'])->name('detail.dechet');
Route::get('/details_payement/{id}',[PayementController::class , 'detailPayement'])->name('detail.payement');
Route::get('/details_avance/{id}',[AvanceController::class , 'detailAvance'])->name('detail.avance');


/*******suppression********************* */

Route::get('/delete_commande/{id}',[CommandeController::class , 'deleteCommande'])->name('delete.commande');
Route::get('/delete_livraison/{id}',[LivraisonController::class , 'deleteLivraison'])->name('delete.livraison');
Route::get('/delete_fournisseur/{id}',[FournisseurController::class , 'deletefournisseur'])->name('delete.fournisseur');
Route::get('/delete_sous_fournisseur/{id}',[SousFournisseurController::class , 'deleteSousFournisseur'])->name('delete.sous_fournisseur');
Route::get('/delete_dechet/{id}',[DechetController::class , 'deleteDechet'])->name('delete.dechet');
Route::get('/delete_payement/{id}',[PayementController::class , 'deletePayement'])->name('delete.payement');
Route::get('/delete_avance/{id}',[AvanceController::class , 'deleteAvance'])->name('delete.avance');

////annuler commande 
Route::get('/annuler_commande/{id}',[CommandeController::class , 'AnnulerCommande'])->name('annuler.commande');


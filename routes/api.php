<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Avance\AvanceController;
use App\Http\Controllers\commande\CommandeController;
use App\Http\Controllers\Dechet\DechetController;
use App\Http\Controllers\fournisseur\FournisseurController;
use App\Http\Controllers\livraison\LivraisonController;
use App\Http\Controllers\palette\PaletteController;
use App\Http\Controllers\palette_fournisseur\PaletteFournisseurController;
use App\Http\Controllers\payement\PayementController;
use App\Http\Controllers\price\PriceTodayController;
use App\Http\Controllers\sous_fournisseur\SousFournisseurController;
use App\Http\Controllers\User\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


/**********************creation****************** */


Route::post('/create_livraison',[LivraisonController::class , 'store_livraison'])->name('store.livraison');
Route::post('/create_commande',[CommandeController::class , 'store_commande'])->name('store.commande');
Route::post('/create_fournisseur',[FournisseurController::class , 'store_fournisseur'])->name('store.fournisseur');
Route::post('/create_payement',[PayementController::class , 'store_payement'])->name('store.payement');
Route::post('/create_avance',[AvanceController::class , 'store_avance'])->name('store.avance');
//soit au traitement ou soit ici
Route::post('/create_dechet',[DechetController::class , 'store_dechet'])->name('store.dechet');
//
Route::post('/login_user',[UserController::class , 'login'])->name('login.user');
Route::post('/create_user',[UserController::class , 'store_user'])->name('store.user');

Route::post('/create_palette',[PaletteController::class , 'store_palette'])->name('store.palette');
Route::post('/create_palette_fournisseur',[PaletteFournisseurController::class , 'store_palette_fournisseur'])->name('store.pfournisseur');
Route::post('/create_price',[PriceTodayController::class , 'store_price'])->name('store.price');


/**********************affichage********************** */
Route::get('/show_commande',[CommandeController::class , 'showCommande'])->name('show.commande');
Route::get('/show_commande_annule',[CommandeController::class , 'showCommandeAnnule'])->name('show.commandeannule');
Route::get('/show_commande_non_livre',[CommandeController::class , 'showCommandeNoLivre'])->name('show.commandenolivre');
Route::get('/show_commande_all',[CommandeController::class , 'showCommandeAll'])->name('show.commandelivre');

Route::get('/show_palette',[PaletteController::class , 'showPalette'])->name('show.palette');
Route::get('/show_palette_fournisseur',[PaletteFournisseurController::class , 'showPaletteFournisseur'])->name('show.palettteFournisseur');

Route::get('/show_fournisseur',[FournisseurController::class , 'showFournisseur'])->name('show.fournisseur');

Route::get('/show_avance',[AvanceController::class , 'showAvance'])->name('show.avance');

Route::get('/show_dechet',[DechetController::class , 'showDechet'])->name('show.dechet');
Route::get('/show_Livraison',[LivraisonController::class , 'showLivraison'])->name('show.livraison');
Route::get('/show_livraisonPaid',[LivraisonController::class , 'getPaid'])->name('show.paid');
Route::get('/show_livraisonUnpaid',[LivraisonController::class , 'getUnpaid'])->name('show.unpaid');

Route::get('/show_payement',[PayementController::class , 'showPayement'])->name('show.payement');

Route::get('/Show_lastIdCommande',[CommandeController::class , 'Show_lastIdCommande'])->name('show.lastId');

//****************************detail*******************************/

Route::get('/details_commande/{id}',[CommandeController::class , 'detailCommande'])->name('detail.commande');
Route::get('/details_commande2/{id}',[CommandeController::class , 'detailCommande2'])->name('detail.commande2');

Route::get('/details_livraison/{id}',[LivraisonController::class , 'detailLivraison'])->name('detail.livraison');
Route::get('/details_fournisseur/{id}',[FournisseurController::class , 'detailfournisseur'])->name('detail.fournisseur');
Route::get('/details_dechet/{id}',[DechetController::class , 'detailDechet'])->name('detail.dechet');
Route::get('/details_payement/{id}',[PayementController::class , 'detailPayement'])->name('detail.payement');
Route::get('/details_avance/{id}',[AvanceController::class , 'detailAvance'])->name('detail.avance');

Route::get('/details_palette/{id}',[PaletteController::class , 'detailPalette'])->name('detail.palette');
Route::get('/details_palette_fournisseur/{id}',[PaletteFournisseurController::class , 'detailPaletteFourinisseur'])->name('detail.pfournisseur');

/*******suppression********************* */

Route::delete('/delete_livraison/{id}',[LivraisonController::class , 'deleteLivraison'])->name('delete.livraison');
Route::delete('/delete_fournisseur/{id}',[FournisseurController::class , 'deletefournisseur'])->name('delete.fournisseur');
Route::delete('/delete_dechet/{id}',[DechetController::class , 'deleteDechet'])->name('delete.dechet');
Route::delete('/delete_payement/{id}',[PayementController::class , 'deletePayement'])->name('delete.payement');
Route::delete('/delete_avance/{id}',[AvanceController::class , 'deleteAvance'])->name('delete.avance');
Route::delete('/delete_commande/{id}',[CommandeController::class , 'deleteCommande'])->name('delete.commande');

////annuler commande 
Route::get('/annuler_commande/{id}',[CommandeController::class , 'AnnulerCommande'])->name('annuler.commande');

Route::get('/show_price',[PriceTodayController::class , 'Show_lastIdprice'])->name('show.lastIdprice');
Route::get('/show_compte',[PriceTodayController::class , 'compte'])->name('show.compte');


Route::post('/login_user',[UserController::class , 'login'])->name('login.user');

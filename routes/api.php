<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\commande\CommandeController;
use App\Http\Controllers\Dechet\DechetController;
use App\Http\Controllers\evenement\EvenementController;
use App\Http\Controllers\facture\FactureController;
use App\Http\Controllers\fournisseur\FournisseurController;
use App\Http\Controllers\livraison\LivraisonController;
use App\Http\Controllers\payement\PayementController;
use App\Http\Controllers\produit\ProduitController;
use App\Http\Controllers\produit_fini\ProsuitFiniController;
use App\Http\Controllers\sous_fournisseur\SousFournisseurController;
use App\Http\Controllers\stock\StockController;
use App\Http\Controllers\traitement\TraitementController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/reception',[ApiController::class , 'index'])->name('accueil');
Route::post('/storer',[ApiController::class , 'store'])->name('store.name');
Route::get('/details/{id}',[ApiController::class , 'detail'])->name('detail.user');

/**********************creation****************** */


Route::post('/create_livraison',[LivraisonController::class , 'store_livraison'])->name('store.livraison');
Route::post('/create_commande',[CommandeController::class , 'store_commande'])->name('store.commande');
Route::post('/create_fournisseur',[FournisseurController::class , 'store_fournisseur'])->name('store.fournisseur');
Route::post('/create_evenement',[EvenementController::class , 'store_evenement'])->name('store.event');
Route::post('/create_produit',[ProduitController::class , 'store_produit'])->name('store.produit');
Route::post('/create_payement',[PayementController::class , 'store_payement'])->name('store.payement');

Route::post('/create_sous_fournisseur',[SousFournisseurController::class , 'store_sous_fournisseur'])->name('store.sous_fournisseur');
Route::post('/create_facture',[FactureController::class , 'store_facture'])->name('store.facture');
Route::post('/create_stock',[StockController::class , 'store_stock'])->name('store.stock');
//soit au traitement ou soit ici
Route::post('/create_dechet',[DechetController::class , 'store_dechet'])->name('store.dechet');
Route::post('/create_produit_fini',[ProsuitFiniController::class , 'store_produit_fini'])->name('store.livraison');
//


/**********************affichage********************** */
Route::get('/show_evenement',[EvenementController::class , 'showEvenement'])->name('show.event');
Route::get('/show_commande',[CommandeController::class , 'showCommande'])->name('show.commande');
Route::get('/show_commande_annule',[CommandeController::class , 'showCommandeAnnule'])->name('show.commandeannule');
Route::get('/show_commande_non_livre',[CommandeController::class , 'showCommandeNoLivre'])->name('show.commandenolivre');

Route::get('/show_fournisseur',[FournisseurController::class , 'showFournisseur'])->name('show.fournisseur');
Route::get('/show_sous_fournisseur',[SousFournisseurController::class , 'showSousFournisseur'])->name('show.sous_fournisseur');
Route::get('/show_produit',[ProduitController::class , 'showProduit'])->name('show.produit');
Route::get('/show_stock',[StockController::class , 'showStock'])->name('show.stock');
Route::get('/show_dechet',[DechetController::class , 'showDechet'])->name('show.dechet');
Route::get('/show_produit_fini',[ProsuitFiniController::class , 'showProduitFini'])->name('show.produit_fini');
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
Route::get('/details_evenement/{id}',[EvenementController::class , 'detailEvent'])->name('detail.event');
Route::get('/details_stock/{id}',[StockController::class , 'detailStock'])->name('detail.Stock');
Route::get('/details_dechet/{id}',[DechetController::class , 'detailDechet'])->name('detail.dechet');
Route::get('/details_produit_fini/{id}',[ProsuitFiniController::class , 'detailProduitFini'])->name('detail.produit_fini');
Route::get('/details_traitement/{id}',[TraitementController::class , 'detailTraitement'])->name('detail.traitement');
Route::get('/details_payement/{id}',[PayementController::class , 'detailPayement'])->name('detail.payement');


/*******suppression********************* */

Route::get('/delete_commande/{id}',[CommandeController::class , 'deleteCommande'])->name('detail.commande');
Route::get('/delete_livraison/{id}',[LivraisonController::class , 'deleteLivraison'])->name('detail.livraison');
Route::get('/delete_fournisseur/{id}',[FournisseurController::class , 'deletefournisseur'])->name('detail.fournisseur');
Route::get('/delete_sous_fournisseur/{id}',[SousFournisseurController::class , 'deleteSousFournisseur'])->name('detail.sous_fournisseur');
Route::get('/delete_evenement/{id}',[EvenementController::class , 'deleteEvent'])->name('detail.event');
Route::get('/delete_stock/{id}',[StockController::class , 'deleteStock'])->name('detail.Stock');
Route::get('/delete_dechet/{id}',[DechetController::class , 'deleteDechet'])->name('detail.dechet');
Route::get('/delete_produit_fini/{id}',[ProsuitFiniController::class , 'deleteProduitFini'])->name('detail.produit_fini');
Route::get('/delete_traitement/{id}',[TraitementController::class , 'deleteTraitement'])->name('detail.traitement');
Route::get('/delete_payement/{id}',[PayementController::class , 'deletePayement'])->name('detail.payement');

////annuler commande 
Route::get('/annuler_commande/{id}',[CommandeController::class , 'AnnulerCommande'])->name('annuler.commande');


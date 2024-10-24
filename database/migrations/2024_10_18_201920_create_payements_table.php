<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('livraison_id')->constrained('livraisons');
            $table->foreignId('fournisseur_id')->constrained('fournisseurs');
            $table->foreignId('prix_jour');
            $table->integer('montant_paye');
            $table->integer('montant_deduise');
            $table->string('mode_payement');
            $table->date('date_payement')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payements');
    }
};

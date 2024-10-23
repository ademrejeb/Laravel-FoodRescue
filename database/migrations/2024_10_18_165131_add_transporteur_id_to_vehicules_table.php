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
        Schema::table('vehicules', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('transporteur_id')->nullable(); // Ajoute la colonne transporteur_id
            $table->foreign('transporteur_id')->references('id')->on('transporteurs')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehicules', function (Blueprint $table) {
            //
            $table->dropForeign(['transporteur_id']); // Supprime la contrainte de clé étrangère
        $table->dropColumn('transporteur_id'); // Supprime la colonne transporteur_id
        });
    }
};

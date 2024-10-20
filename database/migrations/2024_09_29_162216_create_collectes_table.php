<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('collectes', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT
            $table->date('date_collecte')->notNullable();
            $table->string('statut')->notNullable();
            $table->decimal('quantite_collecte', 8, 2)->nullable();
            $table->unsignedBigInteger('donateur_id')->nullable(); // Doit correspondre au type de donateurs.id
            $table->timestamps();

            // Définition de la clé étrangère
            $table->foreign('donateur_id')->references('id')->on('donators')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collectes');
    }
}

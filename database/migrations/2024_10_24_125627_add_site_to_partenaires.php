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
      Schema::table('partenaires', function (Blueprint $table) {
        $table->string('site')->nullable(); // Ajoutez cette ligne pour ajouter la colonne site
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::table('partenaires', function (Blueprint $table) {
        $table->dropColumn('site'); // Supprimez la colonne site lors du rollback
    });
    }
};

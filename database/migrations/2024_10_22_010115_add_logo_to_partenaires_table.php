<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLogoToPartenairesTable extends Migration
{
    public function up()
    {
        Schema::table('partenaires', function (Blueprint $table) {
            $table->string('logo')->nullable(); // Ajoutez cette ligne pour ajouter la colonne logo
        });
    }

    public function down()
    {
        Schema::table('partenaires', function (Blueprint $table) {
            $table->dropColumn('logo'); // Supprimez la colonne logo lors du rollback
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSiteToPartenairesTable extends Migration
{
    public function up()
    {
        Schema::table('partenaires', function (Blueprint $table) {
            $table->string('site')->nullable(); // Ajoutez cette ligne pour ajouter la colonne site
        });
    }

    public function down()
    {
        Schema::table('partenaires', function (Blueprint $table) {
            $table->dropColumn('site'); // Supprimez la colonne site lors du rollback
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratsTable extends Migration
{
    public function up()
    {
        Schema::create('contrats', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('description')->nullable();
            $table->date('date_debut');
            $table->date('date_fin');
            $table->enum('statut', ['actif', 'inactif']);
            $table->string('document')->nullable(); // Path for the document
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contrats');
    }
}

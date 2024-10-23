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
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->integer('capacite');
            $table->string('disponibilite');
            $table->unsignedBigInteger('transporteur_id'); // Clé étrangère
            $table->foreign('transporteur_id')->references('id')->on('transporteurs')->onDelete('cascade'); // Relation
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicules');
    }
};

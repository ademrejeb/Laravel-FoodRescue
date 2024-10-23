<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecurringCollectionsTable extends Migration
{
    public function up()
    {
        Schema::create('recurring_collections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // Référence à l'utilisateur
            $table->string('frequency'); // Fréquence de collecte (quotidienne, hebdomadaire, etc.)
            $table->string('name'); // Nom de l'utilisateur
            $table->string('email'); // Email de l'utilisateur
            $table->string('phone'); // Numéro de téléphone
            $table->text('comments')->nullable(); // Commentaires optionnels
            $table->string('contact_preference')->nullable(); // Préférence de contact (téléphone ou email)
            $table->timestamps(); // created_at et updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('recurring_collections');
    }
}

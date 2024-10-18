<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContributionsTable extends Migration
{
    public function up()
    {
        Schema::create('contributions', function (Blueprint $table) {
            $table->id();
            $table->decimal('montant', 10, 2);
            $table->string('type_contribution');
            $table->date('date_contribution');
            $table->foreignId('partenaire_id')->constrained()->onDelete('cascade'); // Assurez-vous de la clé étrangère
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contributions');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccordsTable extends Migration
{
    public function up()
    {
        Schema::create('accords', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->text('description')->nullable();
            $table->date('date_signature');
            $table->enum('statut', ['actif', 'inactif']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('accords');
    }
}
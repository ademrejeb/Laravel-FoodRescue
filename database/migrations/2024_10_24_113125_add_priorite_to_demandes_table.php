<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('demandes', function (Blueprint $table) {
            $table->integer('priorite')->default(0); // 0 pour aucune priorité, 1 pour priorité faible, etc.
        });
    }
    
    public function down()
    {
        Schema::table('demandes', function (Blueprint $table) {
            $table->dropColumn('priorite');
        });
    }
    
};

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
        Schema::create('appel_candidatures', function (Blueprint $table) {
            $table->id();
            $table->String('libelle');
            $table->String('PROFIL DU POSTE');
            $table->String('DIPLOMES REQUIS');
            $table->String('EXPERIENCE PROFESSIONNELLE');
            $table->String('DETAILS');
            $table->String('PROFILS ET COMPÉTENCES DU CANDIDAT');
            $table->String('COMPOSITION DU DOSSIER DE CANDIDATURE');
            $table->String('DEPOT DE CANDIDATURE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appel_candidatures');
    }
};

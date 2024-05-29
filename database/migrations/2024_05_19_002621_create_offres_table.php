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
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->string('photos')->nullable();
            $table->string('libelle');
            $table->string('profil_poste');
            $table->string('diplomes_requis');
            $table->string('experience_professionnelle');
            $table->text('details');
            $table->text('description');
            $table->text('profils_competences');
            $table->text('composition_dossier');
            $table->text('depot_candidature');
            $table->string('status');
            $table->date('Date_open')->nullable();
            $table->date('Date_close')->nullable();
            $table->timestamps();
        });

    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offres');
    }
};

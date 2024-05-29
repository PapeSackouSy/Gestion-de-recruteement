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
        Schema::create('dossier_candidatures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_offre')->nullable();
            $table->foreign('id_offre')->references('id')->on('offres')->onDelete('set null');
            $table->unsignedBigInteger('id_candidat')->nullable();
            $table->foreign('id_candidat')->references('id')->on('candidats')->onDelete('set null');
            $table->date('datedecreation');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossier_candidatures');
    }
};

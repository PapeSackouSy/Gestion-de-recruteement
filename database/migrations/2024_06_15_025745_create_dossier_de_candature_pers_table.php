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
        Schema::create('dossier_de_candature_pers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candidatures_id');
            $table->foreign('candidatures_id')->references('id')->on('candidature_pers')->onDelete('cascade');
            $table->unsignedBigInteger('offre_id');
            $table->foreign('offre_id')->references('id')->on('offres_pers')->onDelete('cascade');
            $table->date('datedecreation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossier_de_candature_pers');
    }
};

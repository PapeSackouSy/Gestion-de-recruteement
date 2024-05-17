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
        Schema::create('departements', function (Blueprint $table) {
            $table->id();
            $table->String("nom");
            $table->unsignedBigInteger('responsable_departement_id')->nullable();
            $table->foreign('responsable_departement_id')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger('id_ufr')->nullable();
            $table->foreign('id_ufr')->references('id')->on('ufrs')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departements');
    }
};

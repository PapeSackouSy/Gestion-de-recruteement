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
        Schema::create('candidats', function (Blueprint $table) {
            $table->id();
            $table->String('photo');
            $table->String('cv');
            $table->String('motivation');
            $table->date('date_naissance');
            $table->String('lieu_naissance');
            $table->String('nationalite');
            $table->String('sexe');
            $table->String('situation_matrimoniale');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidats');
    }
};

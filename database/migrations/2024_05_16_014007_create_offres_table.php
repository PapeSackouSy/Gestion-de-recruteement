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
            $table->string('titre');
            $table->string('description');
            $table->string('image')->nullable();
            $table->String('Status');
            $table->unsignedBigInteger('id_departement')->nullable();
            $table->foreign('id_departement')->references('id')->on('ufrs')->onDelete('set null');
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

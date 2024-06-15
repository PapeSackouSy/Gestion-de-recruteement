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
        Schema::create('candidature_pers', function (Blueprint $table) {
            $table->id();
            $table->string('cv');
            $table->string('lettre');
            $table->date('datenaissance');;
            $table->string('these');
            $table->timestamps();
        });

        Schema::create('diplomes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candidatures_id');
            $table->string('pub_titre');
            $table->string('pub_institution');
            $table->year('pub_annee');
            $table->string('pub_etude');
            $table->timestamps();

            $table->foreign('candidatures_id')->references('id')->on('candidature_pers')->onDelete('cascade');
        });
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candidatures_id');
            $table->string('titre');
            $table->year('annee');
            $table->string('journal');
            $table->string('lien');
            $table->timestamps();

            $table->foreign('candidatures_id')->references('id')->on('candidature_pers')->onDelete('cascade');
        });

        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candidatures_id');
            $table->string('exp_titre');
            $table->string('nom');
            $table->string('duree');
            $table->text('ex_description');
            $table->timestamps();

            $table->foreign('candidatures_id')->references('id')->on('candidature_pers')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidature_pers');
        Schema::dropIfExists('experiences');
        Schema::dropIfExists('publications');
        Schema::dropIfExists('diplomes');
    }
};

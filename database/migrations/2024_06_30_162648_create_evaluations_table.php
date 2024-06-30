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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->string('critere');
            $table->integer('score');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('commission_id');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('commission_id')->references('id')->on('commissions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};

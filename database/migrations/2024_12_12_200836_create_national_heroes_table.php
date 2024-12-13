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
        Schema::create('national_heroes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('birth_year');
            $table->integer('death_year');
            $table->string('description');
            $table->integer('ascension_year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('national_heroes');
    }
};

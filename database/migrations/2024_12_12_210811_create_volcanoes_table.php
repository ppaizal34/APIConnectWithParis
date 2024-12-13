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
        Schema::create('volcanoes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('bentuk');
            $table->string('tinggi_meter');
            $table->string('estimasi_letusan_terakhir');
            $table->string('geolokasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volcanoes');
    }
};

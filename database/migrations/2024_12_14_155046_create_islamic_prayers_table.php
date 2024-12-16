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
        Schema::create('islamic_prayers', function (Blueprint $table) {
            $table->id();
            $table->string('doa');
            $table->string('ayat');
            $table->string('latin');
            $table->string('artinya');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('islamic_prayers');
    }
};

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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('country_name');
            $table->string('sovereign_state');
            $table->string('country_codes');
            $table->string('official_name');
            $table->string('capital_city');
            $table->string('continent');
            $table->string('member_of');
            $table->string('population');
            $table->string('total_area');
            $table->string('highest_point');
            $table->string('lowest_point');
            $table->string('gdp_percapita');
            $table->string('currency');
            $table->string('calling_code');
            $table->string('internet_tld');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};

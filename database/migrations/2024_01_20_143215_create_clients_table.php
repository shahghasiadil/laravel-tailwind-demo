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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('passport_no');
            $table->integer('residence_country');
            $table->integer('residence_city');
            $table->integer('residence_type')->comment('citizen/residence');
            $table->integer('departure_country');
            $table->integer('departure_city');
            $table->string('locale');
            $table->string('travel_agent_title');
            $table->string('email');
            $table->integer('residence_country_cellular_number');
            $table->string('whatsapp_number');
            $table->string('telegram_nickname');
            $table->string('saudi_cellular_number');
            $table->string('favorite_contact')->comment('one of the above');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};

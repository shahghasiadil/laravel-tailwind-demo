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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('number')->unique();
            $table->string('description');
            $table->string('priority');
            $table->string('reported_by_phone')->comment('not empty means someone unrecognized reported it');
            $table->string('contact_phone')->comment('if empty means contact reported_by_phone');
            $table->string('reported_model_type');
            $table->integer('reported_model_id')->nullable()->comment('this column will be ignored if not client or service_center');
            $table->json('model_data')->nullable()->comment('collection of model row');
            $table->foreignId('created_by')->references('id')->on('users');
            $table->foreignId('closed_by')->nullable()->references('id')->on('users');
            $table->timestamp('closed_at')->nullable();
            $table->foreignId('canceled_by')->nullable()->references('id')->on('users');
            $table->timestamp('canceled_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};

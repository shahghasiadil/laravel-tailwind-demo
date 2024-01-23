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
        Schema::create('user_department_shift', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->timestamp('start_at')->comment('start work in department at');
            $table->timestamp('end_at')->comment('end work or moved from department at');
            $table->text('weekdaystime')->comment('JSON -> weekly calendar of working hours from-to for all days of the week, this is used to notify department personnel');
            $table->foreignId('created_by')->references('id')->on('users');
            $table->foreignId('updated_by')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_department_shift');
    }
};

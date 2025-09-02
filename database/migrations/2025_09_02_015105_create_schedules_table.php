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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); 
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('color')->default('#2563eb');
            $table->string('icon')->nullable();
            $table->timestamps();
        });

        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('start_date_at');
            $table->time('start_time_at');
            $table->time('end_time_at');

            // Recurrence
            $table->enum('frequency', [
                'once', 'hourly', 'daily', 'weekly', 'monthly', 'yearly', 'custom'
            ])->default('once');

            $table->unsignedInteger('interval')->default(1); // e.g., every 2 hours, every 3 weeks
            $table->json('days_of_week')->nullable();        // for weekly schedules
            // $table->date('until')->nullable();               // recurrence end date

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('schedules');
    }
};

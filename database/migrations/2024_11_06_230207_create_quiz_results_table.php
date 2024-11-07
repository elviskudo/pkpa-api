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
        Schema::create('quiz_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->uuid('uuid')->unique();
            $table->dateTime('quiz_start');
            $table->dateTime('quiz_end');
            $table->integer('questions_count');
            $table->integer('correct_answers');
            $table->integer('incorrect_answers');
            $table->integer('unanswered');
            $table->decimal('score', 5, 2);
            $table->enum('status', ['completed', 'ongoing', 'cancelled']); // Sesuaikan dengan status yang mungkin
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_results');
    }
};

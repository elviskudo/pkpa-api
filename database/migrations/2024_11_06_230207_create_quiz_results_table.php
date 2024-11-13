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
            $table->uuid('uuid')->unique();
            $table->uuid('student_id');
            $table->foreign('student_id')->references('uuid')->on('students')->onDelete('cascade');
            $table->dateTime('quiz_start');
            $table->dateTime('quiz_end');
            $table->integer('questions_count')->default(0);
            $table->integer('correct_answers')->default(0);
            $table->integer('incorrect_answers')->default(0);
            $table->integer('unanswered')->default(0);
            $table->decimal('score', 5, 2)->default(0);
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

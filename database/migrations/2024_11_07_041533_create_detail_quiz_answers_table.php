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
        Schema::create('detail_quiz_answers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->uuid('quiz_id');
            $table->foreign('quiz_id')->references('uuid')->on('quizzes')->onDelete('cascade');
            $table->uuid('question_id');
            $table->foreignId('question_id')->references('uuid')->on('questions')->onDelete('cascade');
            $table->uuid('answer_id');
            $table->foreignId('answer_id')->references('uuid')->on('answers')->onDelete('cascade');
            $table->boolean('result');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_quiz_answers');
    }
};

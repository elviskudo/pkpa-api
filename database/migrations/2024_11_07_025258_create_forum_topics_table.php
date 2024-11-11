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
        Schema::create('forum_topics', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->uuid('user_id');
            $table->foreign('user_id')->references('uuid')->on('users');
            $table->foreignId('university_id')->constrained('universities');
            $table->string('title');
            $table->text('content');
            $table->string('image_url')->nullable();
            $table->integer('like_count');
            $table->integer('dislike_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forum_topics_');
    }
};

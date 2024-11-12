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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->uuid('university_id');
            $table->foreign('university_id')->references('uuid')->on('universities')->onDelete('cascade');
            $table->uuid('teacher_id');
            $table->foreign('teacher_id')->references('uuid')->on('teachers')->onDelete('cascade');
            $table->uuid('category_id');
            $table->foreign('category_id')->references('uuid')->on('categories')->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->string('background_image');
            $table->string('certificate_url')->nullable();
            $table->string('guideline_url')->nullable();
            $table->boolean('is_publish')->default(true);
            $table->boolean('is_forum')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};

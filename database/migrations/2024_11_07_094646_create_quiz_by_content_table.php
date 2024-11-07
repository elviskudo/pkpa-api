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
        Schema::create('quiz_by_content', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('content_id')->constrained('contents')->onDelete('cascade');
            $table->text('quetion');
            $table->boolean('random')->default(true);
            $table->integer('order')->default(1);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_by_content');
    }
};

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
        Schema::create('upload_files', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('task_id')->constrained('tasks')->onDelete('cascade');
            $table->string('name');
            $table->string('file_type');
            $table->string('file_url');
            $table->timestamp('upload_at')->nullable();
            $table->foreignId('reviewed_by')->constrained('teachers');
            $table->timestamp('reviewed_at')->nullable();
            $table->foreignId('approved_by')->constrained('teachers');
            $table->timestamp('approved_at')->nullable();
            $table->foreignId('rejected_by')->constrained('teachers');
            $table->timestamp('rejected_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upload_files_');
    }
};

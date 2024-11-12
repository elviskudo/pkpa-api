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
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->string('model');
            $table->uuid('relation_id');
            $table->string('url_name');
            $table->string('file_url');
            $table->string('file_type');
            $table->timestamp('uploaded_at')->nullable()->useCurrent();
            $table->uuid('reviewed_by')->nullable();
            $table->foreign('reviewed_by')->references('uuid')->on('users');
            $table->timestamp('reviewed_at')->nullable();
            $table->uuid('approved_by')->nullable();
            $table->foreign('approved_by')->references('uuid')->on('users');
            $table->timestamp('approved_at')->nullable();
            $table->uuid('rejected_by')->nullable();
            $table->foreign('rejected_by')->references('uuid')->on('users');
            $table->timestamp('rejected_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upload_files');
    }
};

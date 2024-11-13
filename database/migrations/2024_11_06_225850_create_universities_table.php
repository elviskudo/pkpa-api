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
        Schema::create('universities', function (Blueprint $table) {
            $table->id(); 
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->string('code')->unique();
            $table->text('description')->nullable();
            $table->string('slug')->unique();
            $table->string('image_url')->nullable();
            $table->string('logo_url');
            $table->string('certificate_url')->nullable();
            $table->string('brochure_url')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->text('goal')->nullable();
            $table->text('candidate_agreement')->nullable();
            $table->text('core_pattern')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universities');
    }
};

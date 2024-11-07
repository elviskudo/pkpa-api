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
        Schema::create('menus_', function (Blueprint $table) {
            $table->id(); // ID menu
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->text('description')->nullable(); // Deskripsi menu
            $table->string('url');
            $table->string('icon')->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('menus')->onDelete('cascade'); // Kunci asing untuk parent menu
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus_');
    }
};
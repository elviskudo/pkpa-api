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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->uuid('university_id');
            $table->foreign('university_id')->references('uuid')->on('universities')->onDelete('cascade');
            $table->string('name');
            $table->string('nik')->unique();
            $table->string('code')->unique();
            $table->string('speciality');
            $table->text('description')->nullable();
            $table->string('focus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};

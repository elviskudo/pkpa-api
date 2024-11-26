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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->uuid('university_id');
            // $table->foreignId('university_id')->references('uuid')->on('universities')->onDelete('cascade');
            $table->foreign('university_id')->references('uuid')->on('universities')->onDelete('cascade');                                                  
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('birth_place')->nullable();
            $table->string('birth_date')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

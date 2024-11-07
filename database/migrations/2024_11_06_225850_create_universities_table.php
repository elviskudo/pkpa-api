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
            $table->id(); // ID universitas
            $table->uuid('uuid')->unique(); // UUID
            $table->string('name'); // Nama universitas
            $table->string('code')->unique(); // Kode universitas
            $table->text('description')->nullable(); // Deskripsi universitas
            $table->string('slug')->unique(); // Slug untuk URL
            $table->string('image_url')->nullable(); // URL gambar
            $table->string('logo_url')->nullable(); // URL logo
            $table->string('certificate_url')->nullable(); // URL sertifikat
            $table->string('brochure_url')->nullable(); // URL brosur
            $table->text('vision')->nullable(); // Visi universitas
            $table->text('mission')->nullable(); // Misi universitas
            $table->text('goal')->nullable(); // Tujuan universitas
            $table->text('candidate_agreement')->nullable(); // Kesepakatan kandidat
            $table->text('core_pattern')->nullable(); // Pola inti
            $table->boolean('is_active')->default(1); // Status aktif
            $table->integer('order')->default(1); // Urutan
            $table->timestamps(); // Timestamps untuk created_at dan updated_at
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

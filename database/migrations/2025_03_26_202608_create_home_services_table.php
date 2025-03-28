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
        Schema::create('home_services', function (Blueprint $table) {
            $table->id();
            $table->string('consultation_number')->unique();
            $table->string('consultation_topic');
            $table->foreignId('client_id')->constrained('users')->onDelete('cascade');
            $table->string('phone');
            $table->string('location');
            $table->enum('status', ['pending', 'approval', 'completed','rejected'])->default('pending');
            $table->text('original_consultation');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_services');
    }
};

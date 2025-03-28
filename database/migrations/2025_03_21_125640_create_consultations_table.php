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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->string('consultation_number')->unique();
            $table->string('consultation_topic');
            $table->foreignId('client_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('team_id')->constrained('users')->onDelete('cascade');
            $table->enum('status', ['pending', 'waiting_team', 'waiting_client', 'rejected', 'closed', 'completed'])->default('pending');
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
        Schema::dropIfExists('consultations');
    }
};

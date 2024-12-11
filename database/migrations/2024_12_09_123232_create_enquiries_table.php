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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // Foreign key to users table (optional)
            $table->string('name'); // For storing name if user_id is null
            $table->string('email'); // For storing email
            $table->string('phone'); // For storing phone
            $table->string('subject');
            $table->text('message'); // User's message
            $table->text('admin_reply')->nullable(); // Admin's reply
            $table->enum('status', ['pending', 'answered'])->default('pending'); // Tracking status
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};

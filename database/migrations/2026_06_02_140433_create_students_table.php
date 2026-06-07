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

            // BASIC INFO
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('father_name')->nullable();

            // CONTACT
            $table->string('email')->unique();
            $table->string('password')->unique();
            $table->string('phone')->nullable();

            // ACADEMIC
            $table->string('class')->nullable();
            $table->string('subject')->nullable();
            $table->string('roll_no')->unique();

            // PERSONAL
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->date('dob')->nullable();

            // ADDRESS & FILE
            $table->string('file')->nullable();
            $table->text('address')->nullable();
            $table->longText('description')->nullable();
           
            // STATUS (IMPORTANT)
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->softDeletes();
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

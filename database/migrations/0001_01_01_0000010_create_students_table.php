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
            $table->string('first_name');
            $table->string('last_name');
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_main');
            $table->string('phone_other')->nullable();
            $table->string('password');
            $table->string('registration_number')->unique()->nullable();
            $table->string('dorm_room_number')->nullable();
            $table->unsignedSmallInteger('year_admitted')->nullable();
            $table->boolean('graduation_status')->default(0);
            $table->date('graduation_date')->nullable();

            $table->foreignId('class_section_id')->nullable()->constrained('class_sections')->onDelete('cascade');
            $table->foreignId('dorm_id')->nullable()->constrained('dorms')->onDelete('set null');
            $table->foreignId('parent_id')->nullable()->constrained('parents')->onDelete('set null');
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

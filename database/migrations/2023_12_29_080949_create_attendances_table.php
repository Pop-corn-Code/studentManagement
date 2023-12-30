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
        Schema::create('attendances', function (Blueprint $table) {
             $table->id();
            $table->string('status');
            $table->string('course_name');
            $table->foreignId('teacher_id')->index();
            $table->foreignId('student_id')->index();
            // $table->integer('teacher_id')->unsigned(); 
            // $table->integer('student_id')->unsigned(); 
            // $table->foreign('teacher_id')->references("id")->on("teachers")->onDelete('cascade');
            // $table->foreign('student_id')->references("id")->on("students")->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
        
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('duration_in_month');
            $table->string('project_progress');
            $table->string('project_status');
            $table->string('category');
            $table->foreignId('student_id')->reference('id')->on('students');
            $table->foreignId('supervisor_id')->reference('id')->on('lecturers');
            $table->foreignId('examiner_one_id')->reference('id')->on('lecturers');
            $table->foreignId('examiner_two_id')->reference('id')->on('lecturers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};

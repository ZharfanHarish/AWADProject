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
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('student_id');
            $table->dropColumn('supervisor_id');
            $table->dropColumn('examiner_one_id');
            $table->dropColumn('examiner_two_id');
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->foreignId('student_id')->references('id')->on('students');
            $table->foreignId('supervisor_id')->references('id')->on('lecturers');
            $table->foreignId('examiner_one_id')->references('id')->on('lecturers');
            $table->foreignId('examiner_two_id')->references('id')->on('lecturers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('student_id');
            $table->dropColumn('supervisor_id');
            $table->dropColumn('examiner_one_id');
            $table->dropColumn('examiner_two_id');
            $table->foreignId('student_id')->reference('id')->on('students');
            $table->foreignId('supervisor_id')->reference('id')->on('lecturers');
            $table->foreignId('examiner_one_id')->reference('id')->on('lecturers');
            $table->foreignId('examiner_two_id')->reference('id')->on('lecturers');
        });
    }
};

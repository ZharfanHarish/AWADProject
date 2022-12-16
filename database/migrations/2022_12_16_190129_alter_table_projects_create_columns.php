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
            $table->enum('project_progress', ['Milestone 1','Milestone 2','Final Report']);
            $table->enum('project_status', ['On track','Delayed','Extended','Completed']);
            $table->enum('category', ['development','research']);
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
            $table->dropColumn('project_progress');
            $table->dropColumn('project_status');
            $table->dropColumn('category');
        });
    }
};

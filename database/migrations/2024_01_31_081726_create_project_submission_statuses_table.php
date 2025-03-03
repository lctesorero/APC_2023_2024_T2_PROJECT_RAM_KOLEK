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
        Schema::create('project_submission_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('project_id');
            $table->string('user_id');
            $table->string('type');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_submission_statuses');
    }
};

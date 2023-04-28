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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('salary_estimate');
            $table->text('job_description');
            $table->float('rating');
            $table->string('company_name');
            $table->string('location');
            $table->string('headquarters');
            $table->string('size');
            $table->string('founded');
            $table->string('type_of_ownership');
            $table->string('industry');
            $table->string('sector');
            $table->string('revenue');
            $table->string('competitors');
            $table->boolean('easy_apply');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};

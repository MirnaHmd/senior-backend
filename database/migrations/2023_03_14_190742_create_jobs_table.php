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
            $table->foreignIdFor(\App\Models\User::class, 'user_id')
                ->index()
                ->nullable()
                ->default(null)
                ->constrained('users');
            $table->string('job_title');
            $table->text('job_description');
            $table->string('company_name');
            $table->string('location');
            $table->string('industry');
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

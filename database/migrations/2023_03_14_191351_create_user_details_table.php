<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class, 'user_id')
                ->index()
                ->unique()
                ->constrained('users');
            $table->date('birth_date');
            $table->string('gender');
            $table->string('nationality');
            $table->string('city');
            $table->string('number');
            $table->string('preferred_position');
            $table->string('skills');
            $table->string('languages');
            $table->json('education');
            $table->json('previous_positions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};

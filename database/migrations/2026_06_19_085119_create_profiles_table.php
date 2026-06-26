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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('father_name')->nullable();

            $table->date('dob')->nullable();
            $table->string('height')->nullable();
            $table->decimal('salary', 12, 2)->nullable();

            $table->foreignId('gender_id')->nullable()->constrained();
            $table->foreignId('star_id')->nullable()->constrained();
            $table->foreignId('education_qualification_id')->nullable()->constrained();
            $table->foreignId('occupation_id')->nullable()->constrained();

            $table->foreignId('native_place_id')->nullable()->constrained('native_places');
            $table->foreignId('working_place_id')->nullable()->constrained('working_places');

            $table->enum('payment_type', ['none', 'online', 'upi', 'direct',])->default('none');
            $table->string('payment_proof')->nullable();


            $table->boolean('is_active')->default(true);
            $table->boolean('is_paid')->default(false);
            $table->text('inactive_reason')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};

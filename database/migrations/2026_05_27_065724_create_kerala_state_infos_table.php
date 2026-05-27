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
        Schema::create('kerala_state_infos', function (Blueprint $table) {
            $table->id();
            $table->string('state_name')->default('Kerala');
            $table->string('formed_on')->default('1956-11-01');
            $table->string('capital')->default('Thiruvananthapuram');
            $table->string('official_language')->default('Malayalam');
            $table->string('legislature')->default('Kerala Legislative Assembly');
            $table->string('high_court')->default('Kerala High Court');
            $table->string('current_governor')->default('Rajendra Arlekar');
            
            // Important Records
            $table->string('first_cm')->nullable();
            $table->string('first_communist_cm_in_india')->nullable();
            $table->string('only_muslim_cm')->nullable();
            $table->json('longest_serving_leaders')->nullable();

            // Current Government / CM details
            $table->string('current_cm_name')->nullable();
            $table->string('current_cm_party')->nullable();
            $table->string('current_cm_alliance')->nullable();
            $table->string('current_cm_sworn_in')->nullable();
            $table->string('current_cm_status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerala_state_infos');
    }
};

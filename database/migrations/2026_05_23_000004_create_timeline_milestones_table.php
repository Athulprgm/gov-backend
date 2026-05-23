<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('timeline_milestones', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->string('phase_ml');
            $table->string('phase_en');
            $table->text('desc_ml');
            $table->text('desc_en');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('timeline_milestones');
    }
};

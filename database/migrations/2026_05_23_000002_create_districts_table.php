<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name_en');
            $table->string('name_ml');
            $table->string('investment');
            $table->integer('projects_count');
            $table->string('highlight_ml');
            $table->string('highlight_en');
            $table->integer('x');
            $table->integer('y');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('districts');
    }
};

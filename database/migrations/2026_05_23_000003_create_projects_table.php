<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('category_ml');
            $table->string('category_en');
            $table->string('title_ml');
            $table->string('title_en');
            $table->string('district_ml');
            $table->string('district_en');
            $table->text('description_ml');
            $table->text('description_en');
            $table->string('investment');
            $table->integer('percentage');
            $table->text('before_text_ml');
            $table->text('before_text_en');
            $table->text('after_text_ml');
            $table->text('after_text_en');
            $table->string('before_img')->nullable();
            $table->string('after_img')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};

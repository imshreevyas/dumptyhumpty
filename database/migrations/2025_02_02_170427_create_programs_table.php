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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('program_uid');
            $table->string('name');
            $table->string('banner');
            $table->string('page_banner');
            $table->string('title');
            $table->string('slug');
            $table->text('short_description');
            $table->longText('long_description');
            $table->longText('learning_areas')->nullable();
            $table->longText('activities')->nullable();
            $table->string('age_group');
            $table->string('duration_for_week');
            $table->string('duration');
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->longText('schema')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};

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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('page_url');
            $table->string('page_banner');
            $table->string('page_title');
            $table->string('page_description');
            $table->string('seo_title');
            $table->text('seo_description');
            $table->text('seo_short_description');
            $table->string('seo_keywords');
            $table->longText('schemas');
            $table->longText('page_index');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};

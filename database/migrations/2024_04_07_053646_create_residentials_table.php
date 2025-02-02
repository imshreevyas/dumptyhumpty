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
        Schema::create('residentials', function (Blueprint $table) {
            $table->id();
            $table->string('property_uid');
            $table->string('property_name');
            $table->string('property_type')->nullable();
            $table->string('sale_price');
            $table->string('carpet')->nullable();
            $table->string('parking')->nullable();
            $table->string('floor')->nullable();
            $table->string('location')->nullable();
            $table->text('furnished')->nullable();
            $table->string('building_age')->nullable();
            $table->text('landmark')->nullable();
            $table->string('building_name')->nullable();
            $table->date('availability_date')->nullable();
            $table->text('property_assets')->nullable();
            $table->text('property_details')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residentials');
    }
};

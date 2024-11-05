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
        Schema::create('cadastres', function (Blueprint $table) {
            $table->id();
            $table->string('postal_code', 255)->index();
            $table->decimal('land_area', 16, 2)->nullable();
            $table->decimal('construction_area', 16, 2)->nullable();
            $table->string('construction_use', 50)->nullable()->index();
            $table->string('level_range_key', 50);
            $table->integer('construction_year')->nullable();
            $table->string('special_facilities', 20);
            $table->decimal('unit_land_value', 12, 2)->nullable();
            $table->decimal('land_value', 15, 2)->nullable()->index();
            $table->string('unit_land_value_key', 50)->nullable();
            $table->decimal('subsidy', 16, 2)->nullable();
            $table->string('latitude', 255)->nullable();
            $table->string('longitude', 255)->nullable();
            $table->string('neighborhood', 100);
            $table->string('municipality', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cadastre');
    }
};

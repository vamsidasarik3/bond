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
        Schema::create('plots', function (Blueprint $table) {
            $table->id();
            $table->string('plot_number')->unique();
            $table->string('title')->nullable();
            $table->string('plot_type')->default('regular'); // regular, corner, commercial
            $table->decimal('size_sq_yards', 8, 2);
            $table->decimal('price_per_sq_yard', 10, 2)->default(14999.00);
            $table->decimal('total_price', 12, 2);
            $table->string('facing')->default('East'); // East, West, North, South, North-East, etc.
            $table->unsignedSmallInteger('road_width_ft')->default(40); // 40, 60, etc.
            $table->string('boundary_dimensions')->nullable(); // e.g. 36'0" x 41'9"
            $table->string('status')->default('available'); // available, booked, sold
            $table->boolean('is_vaastu_compliant')->default(true);
            $table->text('notes')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plots');
    }
};

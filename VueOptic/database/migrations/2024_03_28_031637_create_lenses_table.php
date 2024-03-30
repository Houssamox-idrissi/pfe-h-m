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
        Schema::create('lenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('glasses_id');
            $table->foreign('glasses_id')->references('id')->on('glasses')->onDelete('cascade');

            $table->unsignedBigInteger('vision_need_id');
            $table->foreign('vision_need_id')->references('id')->on('vision_needs')->onDelete('cascade');

            $table->string('image');

            $table->unsignedBigInteger('lens_type_id');
            $table->foreign('lens_type_id')->references('id')->on('lens_types')->onDelete('cascade');

            $table->unsignedBigInteger('lens_thickness_id');
            $table->foreign('lens_thickness_id')->references('id')->on('lens_thicknesses')->onDelete('cascade');

            $table->unsignedBigInteger('lens_performance_id');
            $table->foreign('lens_performance_id')->references('id')->on('lens_performances')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lenses');
    }
};

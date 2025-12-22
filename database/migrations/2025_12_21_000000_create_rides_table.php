<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('type');
            $table->string('subtitle');
            $table->string('tagline');
            $table->text('description');
            $table->string('list_image');
            $table->string('background_image');
            $table->string('slug')->unique();

            $table->integer('stat_speed')->nullable();
            $table->integer('stat_length')->nullable();
            $table->integer('stat_height')->nullable();
            $table->integer('stat_duration')->nullable();
            $table->integer('stat_capacity')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rides');
    }
};

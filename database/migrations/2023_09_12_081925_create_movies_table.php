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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('ptype_id');
            $table->string('storytellings_id');
            $table->string('movie_url');
            $table->string('movie_title');
            $table->string('movie_slug');
            $table->string('movie_status');
            $table->string('movie_goals')->nullable();
            $table->string('movie_targets')->nullable();
            $table->string('movie_appeals')->nullable();
            $table->string('color_terms')->nullable();
            $table->string('shape_terms')->nullable();
            $table->string('brightness_terms')->nullable();
            $table->string('emotional_terms')->nullable();
            $table->string('environment_terms')->nullable();
            $table->string('object_terms')->nullable();
            $table->string('tag')->nullable();
            $table->string('filming_tech')->nullable();
            $table->string('editing_tech')->nullable();
            $table->string('featured')->nullable();
            $table->string('hot')->nullable();
            $table->integer('creator_id')->nullable();
            $table->string('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};

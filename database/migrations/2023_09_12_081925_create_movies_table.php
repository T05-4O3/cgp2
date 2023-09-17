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
            // Products Category
            $table->string('movcat_id');

            $table->string('movie_url');
            $table->string('movie_title');
            $table->string('movie_code');

            $table->string('movie_status');
            $table->string('movie_goals');
            $table->string('targets_type_id');
            $table->string('movie_appeals');
            
            $table->string('color_id');
            $table->string('shape_id');
            $table->string('brightness_id');
            $table->string('emotional_id');
            $table->string('environment_id');
            $table->string('object_id');

            $table->string('storytellings_id');

            $table->string('genre')->nullable();
            $table->string('tag')->nullable();

            $table->string('filming_tech_id')->nullable();
            $table->string('editing_tech_id')->nullable();

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

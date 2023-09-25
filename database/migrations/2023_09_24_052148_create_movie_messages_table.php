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
        Schema::create('movie_messages', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('creator_id')->nullable();
            $table->integer('movie_id')->nullable();
            $table->string('msg_name')->nullable();
            $table->string('msg_email')->nullable();
            $table->string('msg_phone')->nullable();
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_messages');
    }
};

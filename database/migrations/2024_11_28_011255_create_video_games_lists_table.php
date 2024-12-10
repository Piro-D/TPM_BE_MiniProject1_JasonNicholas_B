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
        Schema::create('video_games_lists', function (Blueprint $table) {
            $table->id();
            $table->string('GameTitle');
            $table->string('Developer');
            $table->date('ReleaseDate');
            $table->date('PlayedSince');
            $table->string('Genre');
            $table->string('image');

            $table->unsignedBigInteger('Category_id');
            $table->foreign('Category_id')->references('id')->on('categories')->onDelete('cascade')-> onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_games_lists');
    }
};

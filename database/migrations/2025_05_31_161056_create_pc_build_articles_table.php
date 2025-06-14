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
        Schema::create('pc_build_articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pc_build_id');
            $table->unsignedBigInteger('article_id');
            $table->timestamps();

            $table->foreign('pc_build_id')
                  ->references('id')
                  ->on('pc_builds')
                  ->onDelete('cascade');

            $table->foreign('article_id')
                  ->references('id')
                  ->on('articles')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pc_build_articles');
    }
};

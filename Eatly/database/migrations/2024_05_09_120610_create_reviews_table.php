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
        

        if (!Schema::hasTable('reviews'))
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index()->nullable();
            $table->integer('dish_id')->index()->nullable();
            $table->string('text');
            $table->unsignedTinyInteger('rating');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};

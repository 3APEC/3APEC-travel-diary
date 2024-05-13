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
        Schema::create('entry_ratings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('entry_id')->unsigned();
            $table->boolean('like')->default('0');
            $table->boolean('dislike')->default('0');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('entry_id')->references('id')->on('entries');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entry_ratings');
    }
};

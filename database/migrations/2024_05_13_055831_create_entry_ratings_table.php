<?php

use App\Models\Entry;
use App\Models\User;
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
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Entry::class);
            $table->boolean('isLike')->default('0');
            $table->boolean('isDislike')->default('0');
            $table->timestamps();
            $table->primary(['user_id', 'entry_id']);
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

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
        Schema::create('space_users', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(App\Models\Spaces::class)->constrained();;
            $table->foreignIdFor(App\Models\User::class)->constrained();;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('space_users');
    }
};

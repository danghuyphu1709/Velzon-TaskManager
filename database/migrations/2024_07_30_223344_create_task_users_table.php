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
        Schema::create('task_users', function (Blueprint $table) {
            $table->foreignIdFor(App\Models\Task::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(App\Models\User::class)->constrained()->onDelete('cascade');
            $table->primary(['task_id','user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_users');
    }
};

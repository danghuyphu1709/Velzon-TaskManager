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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(App\Models\ListTask::class)->constrained()->onDelete('cascade');
            $table->string('code',255)->index();
            $table->string('task_name',255);
            $table->string('task_image',255)->nullable();
            $table->string('task_description',1000)->nullable();
            $table->timestamp('due_date')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};

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
        Schema::create('image_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(App\Models\CommentTask::class)->constrained()->onDelete('cascade');
            $table->string('image',255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_comments');
    }
};

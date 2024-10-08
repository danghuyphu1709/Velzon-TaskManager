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
        Schema::create('table_users', function (Blueprint $table) {
            $table->foreignIdFor(App\Models\Tables::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(App\Models\User::class)->constrained();
            $table->foreignIdFor(App\Models\RoleTables::class)->constrained();
            $table->boolean('is_created')->default(0);
            $table->primary(['tables_id','user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_users');
    }
};

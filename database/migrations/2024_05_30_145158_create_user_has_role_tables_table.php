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
        Schema::create('user_has_role_tables', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(App\Models\User::class)->constrained();;
            $table->foreignIdFor(App\Models\Tables::class)->constrained();;
            $table->foreignIdFor(App\Models\RoleTable::class)->constrained();;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_has_role_tables');
    }
};

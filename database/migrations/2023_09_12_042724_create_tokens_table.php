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
        Schema::create('tokens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained('accounts', 'id')->cascadeOnDelete();
            $table->foreignId('token_type_id')->constrained('token_types', 'id')->cascadeOnDelete();
            $table->string('token');
            $table->unique(['account_id', 'token_type_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tokens');
    }
};

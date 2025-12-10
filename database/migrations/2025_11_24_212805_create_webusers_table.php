<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{   
    public function up(): void
    {
        Schema::create('webusers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique(); // Make email unique
            $table->string('password');
            $table->timestamps(); // Eloquent will handle created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('webusers');
    }
};

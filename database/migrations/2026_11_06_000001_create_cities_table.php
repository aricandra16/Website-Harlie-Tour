<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table): void {
            $table->id();
            $table->string('name', 120);
            $table->string('country_name', 120);
            $table->char('country_code', 2);
            $table->string('timezone', 64)->default('Asia/Jakarta');
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique(['name', 'country_code']);
            $table->index(['country_code', 'is_active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};

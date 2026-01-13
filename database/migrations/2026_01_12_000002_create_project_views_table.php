<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('project_views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->string('session_id', 100);
            $table->timestamps();

            $table->unique(['project_id', 'session_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_views');
    }
};

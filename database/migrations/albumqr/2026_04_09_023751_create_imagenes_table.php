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
        Schema::create('albumqr.imagenes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('titulo')->nullable();
            $table->string('description')->nullable();
            $table->string('name_image');
            $table->string('weight');
            $table->string('weightKB');
            $table->string('path');
            $table->string('extension');
            $table->integer('usuario_id');
            $table->integer('albumes_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albumqr.imagenes');
    }
};

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
        Schema::create('albumqr.personas', function (Blueprint $table) {
            $table->id();
            $table->string('numero_documento');
            $table->string('nombres');
            $table->string('apellidos');
            $table->integer('telefono')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albumqr.personas');
    }
};

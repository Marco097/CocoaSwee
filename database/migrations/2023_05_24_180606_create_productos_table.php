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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 40)->unique();
            $table->string('descripcion', 200);
            $table->decimal('precio', 4, 2);
            $table->char('existencias', 50);
            $table->string('imagen', 100);
            $table->unsignedBigInteger('relleno_id');
            $table->foreign('relleno_id')->references('id')->on('rellenos');
            $table->unsignedBigInteger('catalogo_id');
            $table->foreign('catalogo_id')->references('id')->on('catalogos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};

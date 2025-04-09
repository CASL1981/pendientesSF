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
        Schema::create('pharmacy_exhausteds', function (Blueprint $table) {
            $table->id();
            $table->integer('generic_code')->comment('codigo generico del producto');
            $table->string('generic_name', 192)->comment('nombre del producto');
            $table->string('product_name', 192)->comment('nombre del producto');
            $table->string('manufacturer', 50)->nullable()->comment('marca del producto');
            $table->string('classification', 100)->nullable()->comment('Centro de costo del pendiente');
            $table->date('circular_date')->nullable();
            $table->string('circular', 30)->nullable()->comment('Número de circular de agotado');
            $table->enum('status', ['Activo', 'Inactivo'])->default('Activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pharmacy_exhausteds');
    }
};

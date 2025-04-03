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
        Schema::create('classifications', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10)->comment('Codigo de la clasificación');
            $table->smallInteger('level')->nullable()->comment('Nivel de la clasificación');
            $table->string('parent', 10)->nullable()->comment('Codigo padre de la clasificación');
            $table->string('name', 100)->comment('Nombre de la condición de pago');
            $table->boolean('impute')->default(false)->comment('Marcación de si la clasificación es padre o hija');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classifications');
    }
};

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
        Schema::create('sgc_criteria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('checklist_id');
            $table->foreign('checklist_id')->references('id')->on('sgc_checklists')->onDelete('cascade');
            $table->text('evaluated')->comment('Descripción del criterio evaluado');
            $table->text('description')->comment('Descripción detallada del criterio');
            $table->string('findings', 3)->nullable()->comment('Hallazgos encontrados durante la evaluación');
            $table->text('observations')->nullable()->comment('Observaciones adicionales sobre el criterio');
            $table->text('evidence')->nullable()->comment('Evidencia o pruebas que respaldan el cumplimiento del criterio');
            $table->boolean('status')->default(true)->comment('Estado del cumplimiento del criterio (Cumple, No Cumple, Observaciones)');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sgc_criteria');
    }
};

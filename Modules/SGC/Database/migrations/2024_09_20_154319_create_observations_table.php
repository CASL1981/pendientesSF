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
        Schema::create('sgc_observations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('checklist_id');
            $table->foreign('checklist_id')->references('id')->on('sgc_checklists')->onDelete('cascade');
            $table->unsignedBigInteger('criterion_id');
            $table->foreign('criterion_id')->references('id')->on('sgc_criterions')->onDelete('cascade');
            $table->text('description')->comment('descripción de la NC');
            $table->text('evidence')->nullable()->comment('evidencia de la NC');
            $table->text('consequence')->nullable()->comment('consecuencia de la NC');
            $table->text('requirement')->nullable()->comment('requisito legal o normativo incumplido');
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
        Schema::dropIfExists('sgc_observations');
    }
};

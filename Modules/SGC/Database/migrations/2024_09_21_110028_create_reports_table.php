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
        Schema::create('sgc_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cycle_id');
            $table->foreign('cycle_id')->references('id')->on('sgc_cycles');
            $table->date('star_date')->nullable()->comment('fecha de inico de la auditoria');
            $table->date('end_date')->nullable()->comment('fecha de final de la auditoria');
            $table->text('objective')->comment('objetivo de la auditoria');
            $table->text('scope')->comment('alcance de la auditoria');
            $table->text('auditores')->comment('auditores de la auditoria');
            $table->text('auditados')->comment('auditados de la auditoria');
            $table->text('documents')->comment('documentos de la auditoria');
            $table->text('observations')->nullable()->comment('observaciones de la auditoria');
            $table->text('diverging_opinions')->nullable()->comment('Opiniones divergentes de la auditoria');
            $table->text('conclusions')->nullable()->comment('Conclusiones de la auditoria');
            $table->string('status')->default(true);
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
        Schema::dropIfExists('sgcreports');
    }
};

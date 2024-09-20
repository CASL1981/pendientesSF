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
        Schema::create('sgc_checklists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cycle_id');
            $table->foreign('cycle_id')->references('id')->on('sgc_cycles');
            $table->string('type', 100)->comment('tipo de auditoria');
            $table->unsignedBigInteger('destination_id');
            $table->foreign('destination_id')->references('id')->on('destinations');
            $table->string('process', 192)->comment('Proceso auditado');
            $table->date('date_activity')->comment('Fecha de la actividad');
            $table->text('responsible')->comment('Nommres de los responsables de la activiadad');
            $table->text('audited')->comment('Nombres de los auditados');
            $table->text('documents')->comment('Documentos de referencia');
            $table->text('observations')->nullable()->comment('Observaciones de la lista de chequeo');
            $table->string('prepared_by', 192)->nullable()->comment('Nombre del empleado que prepara la listra de chequeo');
            $table->string('accepted_by', 192)->nullable()->comment('Nombre del empleado que recibe la auditoria');
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('sgc_checklists');
    }
};

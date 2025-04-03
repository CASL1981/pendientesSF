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
        Schema::create('pharmacy_pendings', function (Blueprint $table) {
            $table->id();
            $table->string('type', 20)->default('Pedido')->comment('Tipo de pendiente');
            $table->string('category', 100)->comment('Categoria de la solicitud');
            $table->string('destination', 10)->comment('Centro de costo del pendiente');
            $table->string('reason', 192)->nullable()->comment('Motivo de la pendiente');
            $table->string('duration', 192)->nullable()->comment('Duracion del pendiente');
            $table->string('EPS', 100)->nullable();
            $table->string('contracting_modality', 50)->nullable()->comment('Modalidad de contratacion');
            $table->unsignedBigInteger('user_id')->comment('usuario que solictad el pendiente');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('invoicing_method', 100)->nullable()->comment('Modo de facturacion');
            $table->string('manager', 50)->nullable()->comment('Autorización del Gerente de la ESE - Nombre del gerente');
            $table->string('observations', 255)->nullable()->comment('Observaciones del pendiente');
            $table->enum('status', ['Activo', 'Terminado'])->default('Activo')->comment('Estado de la solicitud de pendido');
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
        Schema::dropIfExists('pharmacy_pendings');
    }
};

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
            $table->unsignedBigInteger('destination_id');
            $table->foreign('destination_id')->references('id')->on('destinations');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('shopping_products');
            $table->integer('quantity')->comment('cantidad de prodcutso pendientes');
            $table->integer('send_quantity')->nullable()->comment('cantidad de prodcutso enviados');
            $table->string('reason', 192)->nullable()->comment('Motivo de la pendiente');
            $table->string('duration', 192)->nullable()->comment('Duracion del pendiente');
            $table->string('EPS', 100)->nullable();
            $table->string('contracting_modality', 50)->nullable()->comment('Modalidad de contratacion');
            $table->unsignedBigInteger('user_id')->comment('usuario que solictad el pendiente');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('invoicing_method', 100)->nullable()->comment('Modo de facturacion');
            $table->string('manager', 50)->nullable()->comment('Autorización del Gerente de la ESE - Nombre del gerente');
            $table->string('order', 20)->nullable()->comment('Número de orden de compra');
            $table->string('circular', 20)->nullable()->comment('Número de circular de agotado');
            $table->text('observations')->nullable();
            $table->enum('status', ['Pendiente', 'Aprobado', 'Rechazado', 'Enviado', 'Recibido'])->default('Pendiente')->comment('Estado de la pendiente');
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

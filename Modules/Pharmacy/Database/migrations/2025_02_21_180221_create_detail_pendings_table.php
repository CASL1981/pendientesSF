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
        Schema::create('pharmacy_detail_pendings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('shopping_products');
            $table->unsignedBigInteger('pending_id');
            $table->foreign('pending_id')->references('id')->on('pharmacy_pendings');
            $table->string('product_name', 192)->comment('nombre del producto');
            $table->string('brand', 50)->nullable()->comment('marca del producto');
            $table->string('destination', 10)->comment('Centro de costo del pendiente');
            $table->integer('quantity')->comment('cantidad de prodcutso pendientes');
            $table->integer('send_quantity')->nullable()->comment('cantidad de prodcutso enviados');
            $table->string('order', 20)->nullable()->comment('Número de orden de compra');
            $table->string('circular', 20)->nullable()->comment('Número de circular de agotado');
            $table->string('observations', 100)->nullable()->comment('Observaciones de cada pendiente');
            $table->enum('status', ['Sin Revisión', 'Cumplido', 'Parcial', 'Pendiente', 'Agotado', 'Editing'])->default('Sin Revisión')
            ->comment('Sin Revisión, cumplido cuando se envia todo el producto, parcial cuando se envia parte del producto, pendiente cuando no se envia el producto, agotado cuando no hay producto en stock');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_operations');
    }
};

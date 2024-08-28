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
        Schema::create('shopping_products', function (Blueprint $table) {
            $table->id();
            $table->integer('item')->comment('consecutivo del sistemas ERP actual');
            $table->string('description', 192);
            $table->string('brand', 100)->nullable()->comment('marca del producto');
            $table->string('ATC', 50)->nullable()->comment('Codigo ATC');
            $table->string('invima', 50)->nullable()->comment('Registro Invima');
            $table->string('measure_unit', 50)->nullable()->comment('Unidad de medida ejemplo TAB');
            $table->string('presentation', 100)->nullable()->comment('presentación del producto ejemplo CJA x 100');
            $table->string('concentration', 50)->nullValue()->comment('concentración del producto ejemplo 500MG');
            $table->string('pharmaceutical_form', 50)->nullable()->comment('forma farmacéutica del producto ejemplo TABLETA');
            $table->string('generic_name', 192)->comment('nombre generico del producto');
            $table->integer('generic_code')->comment('codigo generico del producto');
            $table->integer('tax_percentage')->default(0)->comment('porcentage de IVA');
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
        Schema::dropIfExists('shopping_products');
    }
};

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
        Schema::create('pharmacy_stocks', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->integer('period');
            $table->integer('product_id');
            $table->string('product_name');
            $table->integer('quantity');
            $table->boolean('available')->default(true);
            $table->integer('generic_code')->nullable()->comment('codigo generico del producto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pharmacy_stocks');
    }
};

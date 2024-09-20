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
        Schema::create('humantalent_employees', function (Blueprint $table) {
            $table->id();
            $table->integer('identification')->unique();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->boolean('status')->default(false);
            $table->string('type_document', 2)->nullable();
            $table->string('address', 192)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('cel_phone', 20)->nullable();
            $table->date('entry_date')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('gender', 1)->nullable();
            $table->boolean('vendedor')->nullable()->comment('Identificamos el empleado como un vendedor');
            $table->boolean('audito')->nullable()->comment('Identificamos el empleado como un auditor');
            $table->date('birth_date')->nullable();
            $table->integer('location_id')->nullable();
            $table->boolean('approve')->default(false)->comment('Empleado autorizado para aprobar ordenes');
            $table->string('photo_path', 2048)->nullable();
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
        Schema::dropIfExists('humantalent_employees');
    }
};

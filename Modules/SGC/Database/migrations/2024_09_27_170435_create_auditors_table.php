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
        Schema::create('sgc_auditors', function (Blueprint $table) {
            $table->id();
            $table->integer('cycle_id');
            $table->integer('identification')->comment('identificación del auditor');
            $table->string('first_name', 100)->comment('nombres del auditor');
            $table->string('last_name', 100)->comment('apellidos del auditor');
            $table->string('position', 100)->comment('cargo del auditos');
            $table->string('rol_auditor', 50)->comment('Rol del auditor en la auditoria');
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
        Schema::dropIfExists('sgc_auditors');
    }
};

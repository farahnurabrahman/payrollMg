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
        Schema::create('employees', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('department_id'); 
            $table->foreign('department_id')->references('id')->on('departments');
            $table->string('name');
            $table->string('position');
            $table->decimal('basic_salary', 10, 2); 
            $table->decimal('allowance', 10, 2)->default(0); 
            $table->integer('overtime_hours')->default(0); 
            $table->decimal('hourly_rate', 10, 2)->default(0); 
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

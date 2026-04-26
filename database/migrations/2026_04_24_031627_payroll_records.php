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
        Schema::create('payroll_records', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('employee_id'); 
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->unsignedTinyInteger('month'); 
            $table->unsignedSmallInteger('year'); 
            $table->decimal('gross_pay', 10, 2)->default(0.00);
            $table->decimal('overtime_pay', 10, 2)->default(0.00);
            $table->decimal('tax', 10, 2)->default(0.00);
            $table->decimal('epf_employee', 10, 2)->default(0.00);
            $table->decimal('epf_employer', 10, 2)->default(0.00);
            $table->decimal('net_pay', 10, 2)->default(0.00);
            $table->timestamps(); 
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payroll_records');
    }
};

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PayrollCalculationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function calculateGaji()
    {
        //Contoh data
        $basic_salary = 4000;
        $allowance = 600;
        $overtime_hours = 10;
        $hourly_rate = 25;

        $overtime_pay= ($overtime_hours * $hourly_rate);

        // 2. Formula Pengiraan
        $gross_pay = $basic_salary + $allowance + $overtime_pay;
        $tax = $grossPay * 0.08;
        $epfEmployee = $grossPay * 0.11;
        $epfEmployer = $grossPay * 0.13;

        $netSalary = $grossPay - $tax - $epfEmployee;

        // 3. Jangkaan (Expectation)
        $this->assertEquals(3928.50, $netSalary);
    }
}

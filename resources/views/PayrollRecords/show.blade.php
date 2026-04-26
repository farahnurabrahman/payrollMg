@extends('include.mainlayout')
@section('tittle', 'Payslip - ' . $payrollRecord->employee->name)
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4 no-print">
        <h1 class="h3 mb-0 text-gray-800">Payslip Detail</h1>
        <div>
            <a href="/payrollRecords" class="btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left"></i> Back</a>
            <!-- <button onclick="window.print()" class="btn btn-sm btn-danger shadow-sm"><i class="fas fa-file-pdf"></i> Print to PDF</button> -->
            <a href="{{ route('payroll.download', $payrollRecord->id) }}" class="btn btn-sm btn-danger shadow-sm">
    <i class="fas fa-download"></i> Download PDF
</a>
        </div>
    </div>

    <!-- START PAYSLIP AREA -->
    <div class="card shadow mb-4" id="printableArea">
        <div class="card-body p-5">
            <!-- Header -->
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h2 class="font-weight-bold text-primary">Opensoft Technologies Sdn Bhd</h2>
                    <p class="text-muted">Nadi 15, 10A, Jln Diplomatik,<br>Presint 15 Putrajaya, <br> 62050 , Wilayah Persekutuan Putrajaya</p>
                </div>
                <div class="col-sm-6 text-right">
                    <h4 class="text-uppercase font-weight-bold">Payslip</h4>
                    <p class="mb-0"><strong>Period:</strong> {{ $payrollRecord->month_name }} {{ $payrollRecord->year }}</p>
                    <p><strong>Date Generated:</strong> {{ $payrollRecord->created_at->format('d M Y') }}</p>
                </div>
            </div>

            <hr>

            <!-- Employee Info -->
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h6 class="text-gray-800 font-weight-bold">Employee Details:</h6>
                    <div>Name: {{ $payrollRecord->employee->name }}</div>
                    <div>Position: {{ $payrollRecord->employee->position }}</div>
                    <div>Department: {{ $payrollRecord->employee->department->name }}</div>
                </div>
            </div>

            <!-- Earnings Table -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-light">
                        <tr>
                            <th></th>
                            <th class="text-right">Amount (RM)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Basic Salary</td>
                            <td class="text-right">{{ number_format($payrollRecord->employee->basic_salary, 2) }}</td>
                        </tr>
                        <tr>
                            <td>Allowance</td>
                            <td class="text-right">{{ number_format($payrollRecord->employee->allowance, 2) }}</td>
                        </tr>
                        <tr>
                            <td>Overtime ({{ $payrollRecord->employee->overtime_hours }} hrs @ RM{{ number_format($payrollRecord->employee->hourly_rate, 2) }}/hr)</td>
                            <td class="text-right">{{ number_format($payrollRecord->overtime_pay, 2) }}</td>
                        </tr>
                        <tr class="table-primary font-weight-bold">
                            <td>Gross Pay</td>
                            <td class="text-right">RM {{ number_format($payrollRecord->gross_pay, 2) }}</td>
                        </tr>
                        <tr>
                            <td>Tax 8%</td>
                            <td class="text-right">{{ number_format($payrollRecord->tax, 2) }}</td>
                        </tr>
                        <tr>
                            <td>EPF Employee</td>
                            <td class="text-right">{{ number_format($payrollRecord->epf_employee, 2) }}</td>
                        </tr>
                        <tr>
                            <td>EPF Employer</td>
                            <td class="text-right">{{ number_format($payrollRecord->epf_employer, 2) }}</td>
                        </tr>
                    </tbody>
                    <tfoot class="font-weight-bold">
                        <tr class="table-primary text-primary">
                            <td>Net Pay</td>
                            
                            <td class="text-right">RM {{ number_format($payrollRecord->net_pay, 2) }}</td>
                        </tr>
                    </tfoot>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>

            <!-- Footer -->
            <div class="row mt-5">
                <div class="col-sm-6 text-center">
                    <div style="border-bottom: 1px solid #ccc; width: 200px; margin: auto;"></div>
                    <p class="mt-2">Employer Signature</p>
                </div>
                <div class="col-sm-6 text-center">
                    <div style="border-bottom: 1px solid #ccc; width: 200px; margin: auto;"></div>
                    <p class="mt-2">Employee Signature</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@media print {
    /* 1. Hide browser headers/footers (URL, Title, Date) */
    @page { 
        margin: 0; 
    }
    
    /* 2. Add padding to the body so content doesn't hit the paper edge */
    body { 
        margin: 1.6cm; 
        background-color: white !important; 
    }

    /* 3. Your existing hide rules */
    .no-print, .sidebar, .navbar, .sticky-footer, footer { 
        display: none !important; 
    }
    
    .card { 
        border: none !important; 
        box-shadow: none !important; 
    }
    
    .container-fluid { 
        width: 100%; 
        padding: 0; 
        margin: 0; 
    }
}
</style>
@endsection
<!DOCTYPE html>
<html>

<head>
    <style>
    body {
        font-family: 'Helvetica', sans-serif;
        font-size: 14px;
        color: #333;
    }

    .text-primary {
        color: #4e73df;
    }

    .text-right {
        text-align: right;
    }

    .font-bold {
        font-weight: bold;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #e3e6f0;
        padding: 12px;
    }

    .bg-light {
        background-color: #f8f9fc;
    }

    .bg-primary {
        background-color: #4e73df;
        color: white;
    }

    .footer-section {
        margin-top: 50px;
    }

    .signature-box {
        width: 45%;
        display: inline-block;
        text-align: center;
        border-top: 1px solid #ccc;
        padding-top: 10px;
        margin: 0 2%;
    }
    </style>
    
</head>

<body>
    <div style="margin-bottom: 30px;">
        <h2 class="text-primary">Opensoft Technologies Sdn Bhd</h2>
        <p>Nadi 15, 10A, Jln Diplomatik,<br>Presint 15 Putrajaya, <br> 62050 , Wilayah Persekutuan Putrajaya</p>
    </div>

    <div style="text-align: right; position: absolute; top: 0; right: 0;">
        <h3>PAYSLIP</h3>
        <p><strong>Period:</strong> {{ $payrollRecord->month_name }}
            {{ $payrollRecord->year }}</p>
    </div>

    <hr>

    <div style="margin: 20px 0;">
        <p><strong>Name:</strong> {{ $payrollRecord->employee->name }}</p>
        <p><strong>Position:</strong> {{ $payrollRecord->employee->position }}</p>
        <p><strong>Department:</strong> {{ $payrollRecord->employee->department->name }}</p>
    </div>

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
                <td>Overtime ({{ $payrollRecord->employee->overtime_hours }} hrs @
                    RM{{ number_format($payrollRecord->employee->hourly_rate, 2) }}/hr)</td>
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
    </table>

    <div class="footer-section">
        <div class="signature-box">Employer Signature</div>
        <div class="signature-box">Employee Signature</div>
    </div>
</body>

</html>
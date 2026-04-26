<?php
namespace App\Http\Controllers;
use App\Models\PayrollRecords;
use App\Models\Departments;
use App\Models\Employees;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Barryvdh\DomPDF\Facade\Pdf;

class PayrollRecordsController extends Controller
{
    public function index(Request $request)
    {
        $month = array_map(fn($month) => Carbon::create(null, $month)->format('F'), range(1, 12));
        $year = range(now()->year, now()->year - 10);
        $query = PayrollRecords::with(['employee.department']);

        // Filter by Month
        $query->when($request->month, function ($q) use ($request) {
        $monthNumber = date('n', strtotime($request->month));
            return $q->where('month', $monthNumber);
        });

        // Filter by Year
        $query->when($request->year, function ($q) use ($request) {
            return $q->where('year', $request->year);
        });

        // Filter by Department 
        $query->when($request->department_id, function ($q) use ($request) {
            return $q->whereHas('employee', function ($e) use ($request) {
                $e->where('department_id', $request->department_id);
            });
        });

        $payrollRecords = $query->latest()->get();
        
        $departments = Departments::all(); 

        return view('payrollRecords.index', compact('payrollRecords', 'departments', 'year', 'month'));
    }

    public function create(Request $request)
    {
        $month = array_map(fn($month) => Carbon::create(null, $month)->format('F'), range(1, 12));
        $year = range(now()->year, now()->year - 10);
        $departments = Departments::all();

        $monthView = $request->get('month', date('F'));
        $monthViewNumber = date('n', strtotime($monthView)); 
        $yearView = $request->get('year', date('Y'));

        $employees = Employees::all();

        $payrollRecords = collect();
        if ($month && $year) {
            $payrollRecords = PayrollRecords::with('employee')
                ->where('month', $monthViewNumber)
                ->where('year', $yearView)
                ->latest()
                ->get();
                }
                
        
        return view('payrollRecords.create', compact('payrollRecords', 'employees','departments', 'month', 'year'));
    }

    public function store(Request $request)
    {    
    $monthName = $request->input('month'); 
    $monthNumber = date('n', strtotime($monthName)); 
    $year = $request->input('year'); 

    $employees = Employees::all();
    $createdCount = 0;
    $skippedCount = 0;

    foreach ($employees as $employee) {
        $payroll = PayrollRecords::firstOrCreate(
            ['employee_id' => $employee->id, 'month' => $monthNumber, 'year' => $request->year]
        );

        if ($payroll->wasRecentlyCreated) {
            $createdCount++;
        } else {
            $skippedCount++;
        }
    }


    foreach ($employees as $employee) {
        
        $overTimePay = $employee->overtime_hours * $employee->hourly_rate;
        $grossPay = $employee->basic_salary + $employee->allowance + $overTimePay;
        $tax = $grossPay * 0.08;
        $epfEmployee = $grossPay * 0.11;
        $epfEmployer = $grossPay * 0.13;
        $netSalary = $grossPay - $tax - $epfEmployee;
        
        PayrollRecords::updateOrCreate(
            ['employee_id' => $employee->id, 'month' => $monthNumber, 'year'=> $year],
            [
                'gross_pay' => $grossPay,
                'overtime_pay' => $overTimePay,
                'tax' => $tax,
                'epf_employee' => $epfEmployee,
                'epf_employer' => $epfEmployer,
                'net_pay' => $netSalary,

            ]
        );
    }
        if ($createdCount === 0) {
            return back()->with('info', "All records already exist for $request->month $request->year.");
        }

        return redirect()->route('payrollRecords.create', [
        'month' => $request->month,
        'year'  => $request->year
    ])->with('success', "Generated $createdCount records. Skipped $skippedCount existing records.");
    }

    public function show($id)
    {
        $payrollRecord = PayrollRecords::with('employee.department')->findOrFail($id);
        return view('payrollRecords.show', compact('payrollRecord'));
    }

    public function edit(PayrollRecords $payrollRecord)
    {
        $departments = Departments::all();
        return view('payrollRecords.edit', compact('payrollRecord','departments'));
    }

    public function update(Request $request, PayrollRecords $payrollRecord)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $input = $request->all();
        $payrollRecord->update($input);
        return redirect()->route('payrollRecords.index')
            ->with('success','PayrollRecords updated successfully.');
    }

    public function destroy(PayrollRecords $payrollRecord)
    {
        $payrollRecord->delete();
        return redirect()->route('payrollRecords.index')
            ->with('success','PayrollRecords deleted successfully');
    }

    public function downloadPDF($id)
{
    $payrollRecord = PayrollRecords::with(['employee.department'])->findOrFail($id);

    // Load the specific PDF view
    $pdf = Pdf::loadView('payrollRecords.payslip', compact('payrollRecord'))
              ->setPaper('a4', 'portrait');

    return $pdf->download('Payslip-'.$payrollRecord->employee->name.'.pdf');
}
}
<?php
namespace App\Http\Controllers;
use App\Models\Employees;
use App\Models\Departments;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = Employees::withCount(['department'])->latest()->get();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        
        $departments = Departments::all();
        return view('employees.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Employees::create($input);
        return redirect()->route('employees.index')
            ->with('success','Employees created successfully.');
    }

    public function show(Employees $employee)
    {
         $departments = Departments::all();
        return view('employees.show', compact('employee', 'departments'));
    }

    public function edit(Employees $employee)
    {
        $departments = Departments::all();
        return view('employees.edit', compact('employee','departments'));
    }

    public function update(Request $request, Employees $employee)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $input = $request->all();
        $employee->update($input);
        return redirect()->route('employees.index')
            ->with('success','Employees updated successfully.');
    }

   

    public function destroy($id)
    {
        $employee = Employees::findOrFail($id);
        if ($employee->payrollRecords()->exists()) {
            return back()->with('error', 'Cannot delete Employee. It still has Payroll Record!');
        }

        $employee->delete();
        return back()->with('success', 'Employee deleted successfully.');
    }
}
<?php
namespace App\Http\Controllers;
use App\Models\Departments;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    public function index()
    {
        $departments = Departments::latest()->get();
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
            
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|unique:departments,name|max:255',
        ], [
            'name.unique' => 'This department name already exists.',
            ]);
            
        $input = $request->all();
        Departments::create($input);
        return redirect()->route('departments.index')
            ->with('success','Departments created successfully.');
    }

    public function show(Departments $department)
    {
        return view('departments.show', compact('department'));
    }

    public function edit(Departments $department)
    {
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, Departments $department, $id)
    {
        $request->validate([
            'name' => 'required|unique:departments,name,' . $id,
        ]);
        
        $department = Department::findOrFail($id);

        $input = $request->all();
        $department->update($input);
        return redirect()->route('departments.index')
            ->with('success','Departments updated successfully.');
    }

    public function destroy($id)
    {
        $department = Departments::findOrFail($id);

        // Check if the department has any employees
        if ($department->employees()->exists()) {
            return back()->with('error', 'Cannot delete department. It still has employees!');
        }

        $department->delete();
        return back()->with('success', 'Department deleted successfully.');
    }
}
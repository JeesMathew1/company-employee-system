<?php

namespace App\Http\Controllers\api;
use App\Models\Employee;
use App\Models\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('company')->paginate(10);
        return response()->json($employees);
    }

    public function show($id)
    {
        $employee = Employee::with('company')->findOrFail($id);
        return response()->json($employee);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees',
            'company_id' => 'required|exists:companies,id',
            'mobile_number' => 'required|string',
            'image' => 'required|image',
            'join_date' => 'required|date',
        ]);

        $imagePath = $request->file('image')->store('employees', 'public');

        $employee = Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'company_id' => $request->company_id,
            'mobile_number' => $request->mobile_number,
            'image' => $imagePath,
            'join_date' => $request->join_date,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id(),
        ]);

        return response()->json($employee, 201);
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:employees,email,' . $id,
            'company_id' => 'sometimes|required|exists:companies,id',
            'mobile_number' => 'sometimes|required|string',
            'image' => 'sometimes|image',
            'join_date' => 'sometimes|required|date',
        ]);

        if ($request->hasFile('image')) {
            // Optionally delete the old image file here
            $imagePath = $request->file('image')->store('employees', 'public');
            $employee->image = $imagePath;
        }

        $employee->update([
            'name' => $request->name ?? $employee->name,
            'email' => $request->email ?? $employee->email,
            'company_id' => $request->company_id ?? $employee->company_id,
            'mobile_number' => $request->mobile_number ?? $employee->mobile_number,
            'join_date' => $request->join_date ?? $employee->join_date,
            'updated_by' => Auth::id(),
        ]);

        return response()->json($employee);
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return response()->json(['message' => 'Employee deleted successfully']);
    }
}

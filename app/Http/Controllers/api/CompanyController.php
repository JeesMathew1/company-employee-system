<?php

namespace App\Http\Controllers\api;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::with('employees')->paginate(10);
        return response()->json($companies);
    }

    public function show($id)
    {
        $company = Company::with('employees')->findOrFail($id);
        return response()->json($company);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'logo' => 'required|image',
            'contact_number' => 'required|string',
            'annual_turnover' => 'required|numeric',
        ]);

        $logoPath = $request->file('logo')->store('logos', 'public');

        $company = Company::create([
            'name' => $request->name,
            'description' => $request->description,
            'logo' => $logoPath,
            'contact_number' => $request->contact_number,
            'annual_turnover' => $request->annual_turnover,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id(),
        ]);

        return response()->json($company, 201);
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'logo' => 'sometimes|required|image',
            'contact_number' => 'sometimes|required|string',
            'annual_turnover' => 'sometimes|required|numeric',
        ]);

        if ($request->hasFile('logo')) {
            // Optionally delete the old logo file here
            $logoPath = $request->file('logo')->store('logos', 'public');
            $company->logo = $logoPath;
        }

        $company->update([
            'name' => $request->name ?? $company->name,
            'description' => $request->description ?? $company->description,
            'contact_number' => $request->contact_number ?? $company->contact_number,
            'annual_turnover' => $request->annual_turnover ?? $company->annual_turnover,
            'updated_by' => Auth::id(),
        ]);

        return response()->json($company);
    }

    public function destroy($id)
    {
        $company = Company::with('employees')->findOrFail($id);

        if ($company->employees()->count() > 0) {
            return response()->json(['error' => 'Cannot delete company with employees'], 400);
        }

        $company->delete();
        return response()->json(['message' => 'Company deleted successfully']);
    }
}

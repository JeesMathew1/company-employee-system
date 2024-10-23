<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::with('employees')->paginate(10);
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
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

        Company::create([
            'name' => $request->name,
            'description' => $request->description,
            'logo' => $logoPath,
            'contact_number' => $request->contact_number,
            'annual_turnover' => $request->annual_turnover,
            // 'created_by' => Auth::id(),
            // 'updated_by' => Auth::id(),
        ]);

        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    public function show($id)
    {
        $company = Company::with('employees')->findOrFail($id);
        return view('companies.show', compact('company'));
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'logo' => 'sometimes|image',
            'contact_number' => 'sometimes|required|string',
            'annual_turnover' => 'sometimes|required|numeric',
        ]);

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $company->logo = $logoPath;
        }

        $company->update([
            'name' => $request->name ?? $company->name,
            'description' => $request->description ?? $company->description,
            'contact_number' => $request->contact_number ?? $company->contact_number,
            'annual_turnover' => $request->annual_turnover ?? $company->annual_turnover,
            // 'updated_by' => Auth::id(),
        ]);

        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    public function destroy($id)
    {
        $company = Company::with('employees')->findOrFail($id);

        if ($company->employees()->count() > 0) {
            return redirect()->route('companies.index')->withErrors('Cannot delete company with employees.');
        }

        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guarantee;
use Illuminate\Http\Request;

class AdminGuaranteeController extends Controller
{
public function index()
{
    $guarantees = Guarantee::paginate(10); // Fetch guarantees with pagination
    return view('admin.guarantees.index', compact('guarantees'));
}
public function create()
{
    return view('admin.guarantees.create');
}
public function store(Request $request)
{
    $validated = $request->validate([
        'corporate_reference_number' => 'required|unique:guarantees|max:255',
        'guarantee_type' => 'required|in:Bank,Bid Bond,Insurance,Surety',
        'nominal_amount' => 'required|numeric|min:0.01',
        'nominal_amount_currency' => 'required|string|max:3',
        'expiry_date' => 'required|date|after:today',
        'applicant_name' => 'required|string|max:255',
        'applicant_address' => 'required|string',
        'beneficiary_name' => 'required|string|max:255',
        'beneficiary_address' => 'required|string',
    ]);

    Guarantee::create($validated);

    return redirect()->route('admin.guarantees.index')->with('success', 'Guarantee created successfully.');
}
public function edit(Guarantee $guarantee)
{
    return view('admin.guarantees.edit', compact('guarantee'));
}
public function update(Request $request, Guarantee $guarantee)
{
    $validated = $request->validate([
        'guarantee_type' => 'required|in:Bank,Bid Bond,Insurance,Surety',
        'nominal_amount' => 'required|numeric|min:0',
        'nominal_amount_currency' => 'required|string|max:3',
        'expiry_date' => 'required|date|after:today',
        'applicant_name' => 'required|string|max:255',
        'applicant_address' => 'required|string',
        'beneficiary_name' => 'required|string|max:255',
        'beneficiary_address' => 'required|string',
    ]);

    $guarantee->update($validated);

    return redirect()->route('admin.guarantees.index')->with('success', 'Guarantee updated successfully.');
}
public function destroy(Guarantee $guarantee)
{
    $guarantee->delete();
    return redirect()->route('admin.guarantees.index')->with('success', 'Guarantee deleted successfully.');
}
}
<?php

namespace App\Http\Controllers;

use App\Models\Guarantee;
use Illuminate\Http\Request;

class GuaranteeController extends Controller
{
    // Display a list of guarantees
    public function index()
    {
        $guarantees = Guarantee::all();
        return view('guarantees.index', compact('guarantees'));
    }

    // Show the form for creating a new guarantee
    public function create()
    {
        return view('guarantees.create');
    }

    // Store a newly created guarantee in the database
    public function store(Request $request)
    {
        $request->validate([
            'corporate_reference_number' => 'required|unique:guarantees|max:255',
            'guarantee_type' => 'required|in:Bank,Bid Bond,Insurance,Surety',
            'nominal_amount' => 'required|numeric|min:0',
            'currency' => 'required',
            'expiry_date' => 'required|date|after:today',
            'applicant_name' => 'required|max:255',
            'applicant_address' => 'required',
            'beneficiary_name' => 'required|max:255',
            'beneficiary_address' => 'required',
        ]);

        Guarantee::create($request->all());
        return redirect()->route('guarantees.index')->with('success', 'Guarantee created successfully.');
    }

    // Show the form for editing an existing guarantee
    public function edit(Guarantee $guarantee)
    {
        return view('guarantees.edit', compact('guarantee'));
    }

    // Update an existing guarantee in the database
    public function update(Request $request, Guarantee $guarantee)
    {
        $request->validate([
            'guarantee_type' => 'required|in:Bank,Bid Bond,Insurance,Surety',
            'nominal_amount' => 'required|numeric|min:0',
            'currency' => 'required',
            'expiry_date' => 'required|date|after:today',
            'applicant_name' => 'required|max:255',
            'applicant_address' => 'required',
            'beneficiary_name' => 'required|max:255',
            'beneficiary_address' => 'required',
        ]);

        $guarantee->update($request->all());
        return redirect()->route('guarantees.index')->with('success', 'Guarantee updated successfully.');
    }

    // Delete a guarantee from the database
    public function destroy(Guarantee $guarantee)
    {
        $guarantee->delete();
        return redirect()->route('guarantees.index')->with('success', 'Guarantee deleted successfully.');
    }
}

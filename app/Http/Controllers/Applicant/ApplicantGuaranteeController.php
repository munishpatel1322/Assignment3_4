<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guarantee; 

class ApplicantGuaranteeController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'corporate_reference_number' => 'required|unique:guarantees|max:255',
        'guarantee_type' => 'required|in:Bank,Bid Bond,Insurance,Surety',
        'nominal_amount' => 'required|numeric|min:0',
        'nominal_amount_currency' => 'required|in:USD,EUR,INR,GBP',
        'expiry_date' => 'required|date|after:today',
        'beneficiary_name' => 'required|string|max:255',
        'beneficiary_address' => 'required|string|max:255',
        'applicant_address' => 'required|string|max:255',
    ]);
    $validated['applicant_id'] = auth()->id(); 
    $validated['applicant_name'] = auth()->user()->name;// Link guarantee to applicant
    $validated['status'] = 'pending'; // Default status
    $validated['applicant_address'] = $request->input('applicant_address') ?? auth()->user()->address; // Fetch from request or user's details
    Guarantee::create($validated);

    return redirect()->route('applicant.guarantees.index')
        ->with('success', 'Guarantee application submitted successfully!');
}
public function update(Request $request, Guarantee $guarantee)
    {
        // Ensure the logged-in applicant can only update their own guarantees
        if ($guarantee->applicant_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'guarantee_type' => 'required|in:Bank,Bid Bond,Insurance,Surety',
            'nominal_amount' => 'required|numeric|min:0',
            'expiry_date' => 'required|date|after:today',
            'beneficiary_name' => 'required|string|max:255',
            'beneficiary_address' => 'required|string|max:255',
        ]);

        // Update the guarantee with the validated data
        $guarantee->update($validated);

        // Redirect back to the "My Guarantees" page with a success message
        return redirect()->route('applicant.guarantees.index')
            ->with('success', 'Guarantee updated successfully!');
    }
public function index()
{
    $guarantees = Guarantee::where('applicant_id', auth()->id())->paginate(10);
    return view('applicant.guarantees.index', compact('guarantees'));
}
public function create()
{
    return view('applicant.guarantees.create');
}
public function edit(Guarantee $guarantee)
{
    // Ensure the logged-in applicant can only edit their own guarantees
    if ($guarantee->applicant_id !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }

    return view('applicant.guarantees.edit', compact('guarantee'));
}


}

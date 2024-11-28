@extends('layouts.applicant')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Apply for a Guarantee</h1>

    <form action="{{ route('applicant.guarantees.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="corporate_reference_number" class="block font-medium">Corporate Reference Number</label>
            <input type="text" name="corporate_reference_number" id="corporate_reference_number" 
                   class="w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <div>
    <label for="applicant_name" class="block font-medium">Applicant Name</label>
    <input type="text" name="applicant_name" id="applicant_name" 
           value="{{ auth()->user()->name }}" 
           class="w-full border-gray-300 rounded-md shadow-sm" required>
</div>
<div>
    <label for="applicant_address" class="block font-medium">Applicant Address</label>
    <textarea name="applicant_address" id="applicant_address" 
              class="w-full border-gray-300 rounded-md shadow-sm" rows="4" required></textarea>
</div>

        <div>
            <label for="guarantee_type" class="block font-medium">Guarantee Type</label>
            <select name="guarantee_type" id="guarantee_type" class="w-full border-gray-300 rounded-md shadow-sm" required>
                <option value="">Select Guarantee Type</option>
                <option value="Bank">Bank</option>
                <option value="Bid Bond">Bid Bond</option>
                <option value="Insurance">Insurance</option>
                <option value="Surety">Surety</option>
            </select>
        </div>

        <div>
            <label for="nominal_amount" class="block font-medium">Nominal Amount</label>
            <input type="number" name="nominal_amount" id="nominal_amount" 
                   class="w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <div>
    <label for="nominal_amount_currency" class="block font-medium">Currency</label>
    <select name="nominal_amount_currency" id="nominal_amount_currency" class="w-full border-gray-300 rounded-md shadow-sm" required>
        <option value="">Select Currency</option>
        <option value="USD">USD</option>
        <option value="EUR">EUR</option>
        <option value="INR">INR</option>
        <option value="GBP">GBP</option>
    </select>
</div>

        <div>
            <label for="expiry_date" class="block font-medium">Expiry Date</label>
            <input type="date" name="expiry_date" id="expiry_date" 
                   class="w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <div>
            <label for="beneficiary_name" class="block font-medium">Beneficiary Name</label>
            <input type="text" name="beneficiary_name" id="beneficiary_name" 
                   class="w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <div>
            <label for="beneficiary_address" class="block font-medium">Beneficiary Address</label>
            <textarea name="beneficiary_address" id="beneficiary_address" 
                      class="w-full border-gray-300 rounded-md shadow-sm" rows="4" required></textarea>
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Submit Application</button>
    </form>
@endsection

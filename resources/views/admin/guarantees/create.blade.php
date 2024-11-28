@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Add New Guarantee</h1>
    <form method="POST" action="{{ route('admin.guarantees.store') }}" class="space-y-4">
        @csrf
        <div>
            <label for="corporate_reference_number" class="block text-sm font-medium text-gray-700">Corporate Reference Number</label>
            <input type="text" name="corporate_reference_number" id="corporate_reference_number"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                   required>
        </div>
        <div>
            <label for="guarantee_type" class="block text-sm font-medium text-gray-700">Guarantee Type</label>
            <select name="guarantee_type" id="guarantee_type"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                <option value="">Select a Type</option>
                <option value="Bank">Bank</option>
                <option value="Bid Bond">Bid Bond</option>
                <option value="Insurance">Insurance</option>
                <option value="Surety">Surety</option>
            </select>
        </div>
        <div>
            <label for="nominal_amount" class="block text-sm font-medium text-gray-700">Nominal Amount</label>
            <input type="number" name="nominal_amount" id="nominal_amount"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                   step="0.01" required>
        </div>
        <div>
            <label for="nominal_amount_currency" class="block text-sm font-medium text-gray-700">Currency</label>
            <input type="text" name="nominal_amount_currency" id="nominal_amount_currency"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                   required>
        </div>
        <div>
            <label for="expiry_date" class="block text-sm font-medium text-gray-700">Expiry Date</label>
            <input type="date" name="expiry_date" id="expiry_date"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                   required>
        </div>
        <div>
            <label for="applicant_name" class="block text-sm font-medium text-gray-700">Applicant Name</label>
            <input type="text" name="applicant_name" id="applicant_name"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                   required>
        </div>
        <div>
            <label for="applicant_address" class="block text-sm font-medium text-gray-700">Applicant Address</label>
            <textarea name="applicant_address" id="applicant_address"
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                      required></textarea>
        </div>
        <div>
            <label for="beneficiary_name" class="block text-sm font-medium text-gray-700">Beneficiary Name</label>
            <input type="text" name="beneficiary_name" id="beneficiary_name"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                   required>
        </div>
        <div>
            <label for="beneficiary_address" class="block text-sm font-medium text-gray-700">Beneficiary Address</label>
            <textarea name="beneficiary_address" id="beneficiary_address"
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                      required></textarea>
        </div>
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Submit
        </button>
    </form>
@endsection

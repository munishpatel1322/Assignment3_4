@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit Guarantee</h1>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Edit Guarantee Form -->
        <form action="{{ route('admin.guarantees.update', $guarantee->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
            @csrf
            @method('PUT')

            <!-- Corporate Reference Number (Non-editable) -->
            <div class="mb-4">
                <label for="corporate_reference_number" class="block text-gray-700">Corporate Reference Number</label>
                <input type="text" id="corporate_reference_number" name="corporate_reference_number"
                       value="{{ $guarantee->corporate_reference_number }}" disabled
                       class="w-full border-gray-300 rounded px-4 py-2 bg-gray-100">
            </div>

            <!-- Guarantee Type -->
            <div class="mb-4">
                <label for="guarantee_type" class="block text-gray-700">Guarantee Type</label>
                <select id="guarantee_type" name="guarantee_type" class="w-full border-gray-300 rounded px-4 py-2" required>
                    <option value="Bank" {{ $guarantee->guarantee_type == 'Bank' ? 'selected' : '' }}>Bank</option>
                    <option value="Bid Bond" {{ $guarantee->guarantee_type == 'Bid Bond' ? 'selected' : '' }}>Bid Bond</option>
                    <option value="Insurance" {{ $guarantee->guarantee_type == 'Insurance' ? 'selected' : '' }}>Insurance</option>
                    <option value="Surety" {{ $guarantee->guarantee_type == 'Surety' ? 'selected' : '' }}>Surety</option>
                </select>
            </div>

            <!-- Nominal Amount -->
            <div class="mb-4">
                <label for="nominal_amount" class="block text-gray-700">Nominal Amount</label>
                <input type="number" id="nominal_amount" name="nominal_amount"
                       value="{{ $guarantee->nominal_amount }}"
                       class="w-full border-gray-300 rounded px-4 py-2" required>
            </div>

            <!-- Nominal Amount Currency -->
            <div class="mb-4">
                <label for="nominal_amount_currency" class="block text-gray-700">Nominal Amount Currency</label>
                <input type="text" id="nominal_amount_currency" name="nominal_amount_currency"
                       value="{{ $guarantee->nominal_amount_currency }}"
                       class="w-full border-gray-300 rounded px-4 py-2" required>
            </div>

            <!-- Expiry Date -->
            <div class="mb-4">
                <label for="expiry_date" class="block text-gray-700">Expiry Date</label>
                <input type="date" id="expiry_date" name="expiry_date"
                       value="{{ $guarantee->expiry_date }}"
                       class="w-full border-gray-300 rounded px-4 py-2" required>
            </div>

            <!-- Applicant Name -->
            <div class="mb-4">
                <label for="applicant_name" class="block text-gray-700">Applicant Name</label>
                <input type="text" id="applicant_name" name="applicant_name"
                       value="{{ $guarantee->applicant_name }}"
                       class="w-full border-gray-300 rounded px-4 py-2" required>
            </div>

            <!-- Applicant Address -->
            <div class="mb-4">
                <label for="applicant_address" class="block text-gray-700">Applicant Address</label>
                <textarea id="applicant_address" name="applicant_address"
                          class="w-full border-gray-300 rounded px-4 py-2" required>{{ $guarantee->applicant_address }}</textarea>
            </div>

            <!-- Beneficiary Name -->
            <div class="mb-4">
                <label for="beneficiary_name" class="block text-gray-700">Beneficiary Name</label>
                <input type="text" id="beneficiary_name" name="beneficiary_name"
                       value="{{ $guarantee->beneficiary_name }}"
                       class="w-full border-gray-300 rounded px-4 py-2" required>
            </div>

            <!-- Beneficiary Address -->
            <div class="mb-4">
                <label for="beneficiary_address" class="block text-gray-700">Beneficiary Address</label>
                <textarea id="beneficiary_address" name="beneficiary_address"
                          class="w-full border-gray-300 rounded px-4 py-2" required>{{ $guarantee->beneficiary_address }}</textarea>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection

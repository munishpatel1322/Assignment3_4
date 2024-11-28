@extends('layouts.applicant') <!-- Extending the admin layout -->

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Guarantee</h1>

    <form action="{{ route('applicant.guarantees.update', $guarantee) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="corporate_reference_number" class="block font-bold mb-1">Corporate Reference Number</label>
            <input type="text" id="corporate_reference_number" name="corporate_reference_number" value="{{ $guarantee->corporate_reference_number }}" class="w-full border-gray-300 rounded" readonly>
        </div>

        <div>
            <label for="guarantee_type" class="block font-bold mb-1">Guarantee Type</label>
            <select id="guarantee_type" name="guarantee_type" class="w-full border-gray-300 rounded" required>
                <option value="Bank" {{ $guarantee->guarantee_type === 'Bank' ? 'selected' : '' }}>Bank</option>
                <option value="Bid Bond" {{ $guarantee->guarantee_type === 'Bid Bond' ? 'selected' : '' }}>Bid Bond</option>
                <option value="Insurance" {{ $guarantee->guarantee_type === 'Insurance' ? 'selected' : '' }}>Insurance</option>
                <option value="Surety" {{ $guarantee->guarantee_type === 'Surety' ? 'selected' : '' }}>Surety</option>
            </select>
        </div>

        <div>
            <label for="nominal_amount" class="block font-bold mb-1">Nominal Amount</label>
            <input type="number" id="nominal_amount" name="nominal_amount" value="{{ $guarantee->nominal_amount }}" class="w-full border-gray-300 rounded" required>
        </div>

        <div>
            <label for="expiry_date" class="block font-bold mb-1">Expiry Date</label>
            <input type="date" id="expiry_date" name="expiry_date" value="{{ $guarantee->expiry_date }}" class="w-full border-gray-300 rounded" required>
        </div>

        <div>
            <label for="beneficiary_name" class="block font-bold mb-1">Beneficiary Name</label>
            <input type="text" id="beneficiary_name" name="beneficiary_name" value="{{ $guarantee->beneficiary_name }}" class="w-full border-gray-300 rounded" required>
        </div>

        <div>
            <label for="beneficiary_address" class="block font-bold mb-1">Beneficiary Address</label>
            <textarea id="beneficiary_address" name="beneficiary_address" class="w-full border-gray-300 rounded" required>{{ $guarantee->beneficiary_address }}</textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Guarantee</button>
    </form>
@endsection

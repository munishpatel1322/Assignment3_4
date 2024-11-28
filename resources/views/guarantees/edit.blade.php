@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold">Edit Guarantee</h1>
    <form action="{{ route('guarantees.update', $guarantee->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Use PUT method for updating -->
        
        <!-- Corporate Reference Number (disabled as it can't be updated) -->
        <div class="mb-4">
            <label for="corporate_reference_number" class="block text-sm font-medium">Corporate Reference Number</label>
            <input type="text" id="corporate_reference_number" name="corporate_reference_number" value="{{ $guarantee->corporate_reference_number }}" class="form-input" disabled>
        </div>
        
        <!-- Guarantee Type -->
        <div class="mb-4">
            <label for="guarantee_type" class="block text-sm font-medium">Guarantee Type</label>
            <select id="guarantee_type" name="guarantee_type" class="form-select">
                <option value="Bank" {{ $guarantee->guarantee_type == 'Bank' ? 'selected' : '' }}>Bank</option>
                <option value="Bid Bond" {{ $guarantee->guarantee_type == 'Bid Bond' ? 'selected' : '' }}>Bid Bond</option>
                <option value="Insurance" {{ $guarantee->guarantee_type == 'Insurance' ? 'selected' : '' }}>Insurance</option>
                <option value="Surety" {{ $guarantee->guarantee_type == 'Surety' ? 'selected' : '' }}>Surety</option>
            </select>
        </div>
        
        <!-- Nominal Amount -->
        <div class="mb-4">
            <label for="nominal_amount" class="block text-sm font-medium">Nominal Amount</label>
            <input type="number" id="nominal_amount" name="nominal_amount" value="{{ $guarantee->nominal_amount }}" class="form-input" required>
        </div>
        
        <!-- Currency -->
        <div class="mb-4">
            <label for="currency" class="block text-sm font-medium">Currency</label>
            <input type="text" id="currency" name="currency" value="{{ $guarantee->currency }}" class="form-input" required>
        </div>
        
        <!-- Expiry Date -->
        <div class="mb-4">
            <label for="expiry_date" class="block text-sm font-medium">Expiry Date</label>
            <input type="date" id="expiry_date" name="expiry_date" value="{{ $guarantee->expiry_date }}" class="form-input" required>
        </div>
        
        <!-- Applicant Name -->
        <div class="mb-4">
            <label for="applicant_name" class="block text-sm font-medium">Applicant Name</label>
            <input type="text" id="applicant_name" name="applicant_name" value="{{ $guarantee->applicant_name }}" class="form-input" required>
        </div>
        
        <!-- Applicant Address -->
        <div class="mb-4">
            <label for="applicant_address" class="block text-sm font-medium">Applicant Address</label>
            <textarea id="applicant_address" name="applicant_address" class="form-textarea" required>{{ $guarantee->applicant_address }}</textarea>
        </div>
        
        <!-- Beneficiary Name -->
        <div class="mb-4">
            <label for="beneficiary_name" class="block text-sm font-medium">Beneficiary Name</label>
            <input type="text" id="beneficiary_name" name="beneficiary_name" value="{{ $guarantee->beneficiary_name }}" class="form-input" required>
        </div>
        
        <!-- Beneficiary Address -->
        <div class="mb-4">
            <label for="beneficiary_address" class="block text-sm font-medium">Beneficiary Address</label>
            <textarea id="beneficiary_address" name="beneficiary_address" class="form-textarea" required>{{ $guarantee->beneficiary_address }}</textarea>
        </div>
        
        <!-- Submit Button -->
        <div>
            <button type="submit" class="btn btn-primary">Update Guarantee</button>
        </div>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold">Create Guarantee</h1>
    <form action="{{ route('guarantees.store') }}" method="POST">
        @csrf
        <!-- Input fields for each attribute -->
        <input type="text" name="corporate_reference_number" placeholder="Corporate Reference Number" required>
        <select name="guarantee_type">
            <option value="Bank">Bank</option>
            <option value="Bid Bond">Bid Bond</option>
            <option value="Insurance">Insurance</option>
            <option value="Surety">Surety</option>
        </select>
        <input type="number" name="nominal_amount" placeholder="Nominal Amount" required>
        <input type="text" name="currency" placeholder="Currency" required>
        <input type="date" name="expiry_date" required>
        <input type="text" name="applicant_name" placeholder="Applicant Name" required>
        <textarea name="applicant_address" placeholder="Applicant Address"></textarea>
        <input type="text" name="beneficiary_name" placeholder="Beneficiary Name" required>
        <textarea name="beneficiary_address" placeholder="Beneficiary Address"></textarea>
        <button type="submit" class="btn btn-primary">Create Guarantee</button>
    </form>
</div>
@endsection

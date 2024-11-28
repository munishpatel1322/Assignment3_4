@extends('layouts.app')

@section('content')
<h1>Guarantee Details</h1>
<table class="table table-bordered">
    <tr>
        <th>Corporate Reference Number</th>
        <td>{{ $guarantee->corporate_reference_number }}</td>
    </tr>
    <tr>
        <th>Guarantee Type</th>
        <td>{{ $guarantee->guarantee_type }}</td>
    </tr>
    <tr>
        <th>Nominal Amount</th>
        <td>{{ $guarantee->nominal_amount }} {{ $guarantee->nominal_amount_currency }}</td>
    </tr>
    <tr>
        <th>Expiry Date</th>
        <td>{{ $guarantee->expiry_date }}</td>
    </tr>
    <tr>
        <th>Applicant Name</th>
        <td>{{ $guarantee->applicant_name }}</td>
    </tr>
    <tr>
        <th>Applicant Address</th>
        <td>{{ $guarantee->applicant_address }}</td>
    </tr>
    <tr>
        <th>Beneficiary Name</th>
        <td>{{ $guarantee->beneficiary_name }}</td>
    </tr>
    <tr>
        <th>Beneficiary Address</th>
        <td>{{ $guarantee->beneficiary_address }}</td>
    </tr>
</table>

<a href="{{ route('guarantees.index') }}" class="btn btn-secondary">Back to List</a>
<a href="{{ route('guarantees.edit', $guarantee->id) }}" class="btn btn-warning">Edit</a>

<form action="{{ route('guarantees.destroy', $guarantee->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this guarantee?');">Delete</button>
</form>
@endsection

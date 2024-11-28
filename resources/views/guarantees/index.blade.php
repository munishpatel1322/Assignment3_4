@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold">Guarantees</h1>
    <a href="{{ route('guarantees.create') }}" class="btn btn-primary mb-3">Create Guarantee</a>
    <table class="table-auto w-full border-collapse">
        <thead>
            <tr>
                <th>Corporate Reference Number</th>
                <th>Guarantee Type</th>
                <th>Nominal Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($guarantees as $guarantee)
            <tr>
                <td>{{ $guarantee->corporate_reference_number }}</td>
                <td>{{ $guarantee->guarantee_type }}</td>
                <td>{{ $guarantee->nominal_amount }} {{ $guarantee->currency }}</td>
                <td>
                    <a href="{{ route('guarantees.edit', $guarantee) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('guarantees.destroy', $guarantee) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

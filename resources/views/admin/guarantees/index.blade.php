@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Manage Guarantees</h1>
    <a href="{{ route('admin.guarantees.create') }}" class="text-blue-500">+ Add New Guarantee</a>
    <table class="min-w-full bg-white border-collapse border border-gray-200 mt-4">
        <thead>
            <tr>
                <th class="border p-2">Corporate Ref. No.</th>
                <th class="border p-2">Type</th>
                <th class="border p-2">Nominal Amount</th>
                <th class="border p-2">Expiry Date</th>
                <th class="border p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($guarantees as $guarantee)
            <tr>
                <td class="border p-2">{{ $guarantee->corporate_reference_number }}</td>
                <td class="border p-2">{{ $guarantee->guarantee_type }}</td>
                <td class="border p-2">{{ $guarantee->nominal_amount }} {{ $guarantee->nominal_amount_currency }}</td>
                <td class="border p-2">{{ $guarantee->expiry_date }}</td>
                <td class="border p-2">
                    <a href="{{ route('admin.guarantees.edit', $guarantee) }}" class="text-yellow-500">Edit</a>
                    <form action="{{ route('admin.guarantees.destroy', $guarantee) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $guarantees->links() }}
    @endsection

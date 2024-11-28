@extends('layouts.applicant') <!-- Extending the applicant layout -->

@section('content')
    <h1 class="text-2xl font-bold mb-4">My Guarantees</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-2 px-4 border border-gray-300">Corporate Reference Number</th>
                    <th class="py-2 px-4 border border-gray-300">Guarantee Type</th>
                    <th class="py-2 px-4 border border-gray-300">Status</th>
                    <th class="py-2 px-4 border border-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($guarantees as $guarantee)
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-4 border border-gray-300">{{ $guarantee->corporate_reference_number }}</td>
                        <td class="py-2 px-4 border border-gray-300">{{ $guarantee->guarantee_type }}</td>
                        <td class="py-2 px-4 border border-gray-300 capitalize">{{ $guarantee->status }}</td>
                        <td class="py-2 px-4 border border-gray-300">
                            <a href="{{ route('applicant.guarantees.edit', $guarantee) }}" class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('applicant.guarantees.destroy', $guarantee) }}" method="POST" class="inline-block ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this guarantee?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-4 px-4 text-center text-gray-500">No guarantees found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

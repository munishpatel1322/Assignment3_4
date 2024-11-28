@extends('layouts.reviewer')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Review Guarantee</h1>
    <p><strong>Corporate Reference Number:</strong> {{ $guarantee->corporate_reference_number }}</p>
    <p><strong>Type:</strong> {{ $guarantee->guarantee_type }}</p>
    <p><strong>Nominal Amount:</strong> {{ $guarantee->nominal_amount }} {{ $guarantee->currency }}</p>
    <p><strong>Expiry Date:</strong> {{ $guarantee->expiry_date }}</p>

    <form action="{{ route('reviewer.guarantees.review', $guarantee) }}" method="POST" class="mt-4">
        @csrf
        <label for="review_comments" class="block text-lg font-bold">Comments:</label>
        <textarea name="review_comments" id="review_comments" rows="4" class="w-full border p-2"></textarea>

        <label for="status" class="block text-lg font-bold mt-4">Decision:</label>
        <select name="status" id="status" class="w-full border p-2">
            <option value="approved">Approve</option>
            <option value="rejected">Reject</option>
        </select>

        <button type="submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded">Submit Review</button>
    </form>
    @endsection


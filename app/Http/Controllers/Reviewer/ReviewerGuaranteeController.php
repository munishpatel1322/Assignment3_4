<?php

namespace App\Http\Controllers\Reviewer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewerGuaranteeController extends Controller
{
    public function pending()
{
    $guarantees = Guarantee::where('status', 'pending')->paginate(10);
    return view('reviewer.guarantees.pending', compact('guarantees'));
}
public function show(Guarantee $guarantee)
{
    return view('reviewer.guarantees.show', compact('guarantee'));
}
public function review(Request $request, Guarantee $guarantee)
{
    $request->validate([
        'review_comments' => 'required|string|max:1000',
        'status' => 'required|in:approved,rejected',
    ]);

    $guarantee->update([
        'review_comments' => $request->review_comments,
        'status' => $request->status,
        'reviewed_by' => auth()->id(),
        'reviewed_at' => now(),
    ]);

    return redirect()->route('reviewer.guarantees.pending')
        ->with('success', 'Guarantee has been reviewed successfully!');
}

}

<?php

namespace App\Http\Controllers\Reviewer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewerController extends Controller
{
    public function dashboard()
{
    $pendingGuarantees = Guarantee::where('status', 'pending')->count();
    $completedReviews = Guarantee::where('reviewed_by', auth()->id())->count();

    return view('reviewer.dashboard', compact('pendingGuarantees', 'completedReviews'));
}
public function __construct()
{
    $this->middleware('auth');
    $this->middleware(function ($request, $next) {
        if (auth()->user()->role !== 'reviewer') {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    });
}

}

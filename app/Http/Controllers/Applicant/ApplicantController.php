<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guarantee;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{
    public function dashboard()
{
    $activeGuarantees = Guarantee::where('applicant_id', auth()->id())
        ->where('status', 'active')
        ->count();

    $pendingApplications = Guarantee::where('applicant_id', auth()->id())
        ->where('status', 'pending')
        ->count();

    return view('applicant.dashboard', compact('activeGuarantees', 'pendingApplications'));
}
}

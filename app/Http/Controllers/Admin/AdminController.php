<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User; // Import User model
use App\Models\Guarantee; // Import Guarantee model
use Illuminate\Support\Facades\DB; // Import DB facade for raw queries


class AdminController extends Controller
{
    public function dashboard()
{
    $totalUsers = User::count();
    $totalGuarantees = Guarantee::count();
    $totalFiles = DB::table('uploaded_files')->count(); // Assuming a table for files
    return view('admin.dashboard', compact('totalUsers', 'totalGuarantees', 'totalFiles'));
}

}


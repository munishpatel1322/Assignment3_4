<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UploadedFile;
use Illuminate\Support\Facades\DB;

class AdminFileController extends Controller
{
    public function index()
    {
        $files = DB::table('file_uploads')->paginate(10); // Assuming 'uploaded_files' table
        return view('admin.files.index', compact('files'));
    }

    public function destroy($id)
    {
        $file = DB::table('file_uploads')->find($id);
        if ($file) {
            DB::table('file_uploads')->where('id', $id)->delete();
            return redirect()->route('admin.files.index')->with('success', 'File deleted successfully.');
        }

        return redirect()->route('admin.files.index')->with('error', 'File not found.');
    }
    public function store(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:csv,xml,json|max:2048', // Validate file type and size
    ]);

    $file = $request->file('file');
    $uploadedFile = UploadedFile::create([
        'file_name' => $file->getClientOriginalName(),
        'file_type' => $file->getClientMimeType(),
        'file_blob' => file_get_contents($file), // Store the file as a blob
    ]);

    return redirect()->route('admin.files.index')->with('success', 'File uploaded successfully!');
}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guarantee;
use Illuminate\Support\Facades\Storage;

class BulkUploadController extends Controller
{
    public function showForm()
    {
        return view('bulk_upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,json,xml|max:2048',
        ]);

        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();

        $path = $file->storeAs('uploads', $file->getClientOriginalName(), 'public');

        switch ($extension) {
            case 'csv':
                $this->processCSV($path);
                break;
            case 'json':
                $this->processJSON($path);
                break;
            case 'xml':
                $this->processXML($path);
                break;
            default:
                return redirect()->back()->withErrors(['Unsupported file format.']);
        }

        return redirect()->back()->with('success', 'File uploaded and processed successfully!');
    }

    private function processCSV($path)
    {
        $file = Storage::disk('public')->get($path);
        $rows = array_map('str_getcsv', explode("\n", $file));
        $header = array_shift($rows);

        foreach ($rows as $row) {
            if (count($row) < count($header)) continue;

            $data = array_combine($header, $row);

            Guarantee::create([
                'corporate_reference_number' => $data['corporate_reference_number'],
                'guarantee_type' => $data['guarantee_type'],
                'nominal_amount' => $data['nominal_amount'],
                'currency' => $data['currency'],
                'expiry_date' => $data['expiry_date'],
                'applicant_name' => $data['applicant_name'],
                'applicant_address' => $data['applicant_address'],
                'beneficiary_name' => $data['beneficiary_name'],
                'beneficiary_address' => $data['beneficiary_address'],
            ]);
        }
    }

    private function processJSON($path)
    {
        $file = Storage::disk('public')->get($path);
        $data = json_decode($file, true);

        foreach ($data as $item) {
            Guarantee::create([
                'corporate_reference_number' => $item['corporate_reference_number'],
                'guarantee_type' => $item['guarantee_type'],
                'nominal_amount' => $item['nominal_amount'],
                'currency' => $item['currency'],
                'expiry_date' => $item['expiry_date'],
                'applicant_name' => $item['applicant_name'],
                'applicant_address' => $item['applicant_address'],
                'beneficiary_name' => $item['beneficiary_name'],
                'beneficiary_address' => $item['beneficiary_address'],
            ]);
        }
    }

    private function processXML($path)
    {
        $file = Storage::disk('public')->get($path);
        $xml = simplexml_load_string($file);
        $json = json_encode($xml);
        $data = json_decode($json, true);

        foreach ($data['guarantee'] as $item) {
            Guarantee::create([
                'corporate_reference_number' => $item['corporate_reference_number'],
                'guarantee_type' => $item['guarantee_type'],
                'nominal_amount' => $item['nominal_amount'],
                'currency' => $item['currency'],
                'expiry_date' => $item['expiry_date'],
                'applicant_name' => $item['applicant_name'],
                'applicant_address' => $item['applicant_address'],
                'beneficiary_name' => $item['beneficiary_name'],
                'beneficiary_address' => $item['beneficiary_address'],
            ]);
        }
    }
}

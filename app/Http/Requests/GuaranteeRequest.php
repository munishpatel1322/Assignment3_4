<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuaranteeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'corporate_reference_number' => 'required|unique:guarantees,corporate_reference_number',
            'guarantee_type' => 'required|in:Bank,Bid Bond,Insurance,Surety',
            'nominal_amount' => 'required|numeric|min:0',
            'nominal_amount_currency' => 'required|string|size:3', // Assuming 3-letter currency codes
            'expiry_date' => 'required|date|after:today',
            'applicant_name' => 'required|string|max:255',
            'applicant_address' => 'required|string',
            'beneficiary_name' => 'required|string|max:255',
            'beneficiary_address' => 'required|string',
        ];
    }
}

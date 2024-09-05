<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
            'group_id' => ['required', 'integer'],
            'passbook_no' => ['required', 'integer'],
            'loan_count' => ['required', 'integer'],
            'enable_mortuary' => ['required', 'integer'],
            'mortuary_coverage_start' => ['required', 'date'],
            'motuary_coverage_end' => ['required', 'date']
        ];
    }
}

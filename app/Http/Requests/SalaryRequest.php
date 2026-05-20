<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SalaryRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'employee_id'               => 'required',
            'gaji_pokok'                => 'required|numeric|min:0',
            'tunjangan_makan'           => 'nullable|min:0',
            'tunjangan_transportasi'    => 'nullable|min:0',
            'potongan'                  => 'nullable|min:0',
            'gaji_bersih'               => 'required|numeric|min:0',
            'bulan'                     => 'required|integer|min:1|max:12',
            'tahun'                     => 'required|integer|min:2020|max:2030',
        ];
    }

    public function messages(): array
    {
        return [
            'employee_id.required' => 'Employee wajib dipilih!',
            'gaji_pokok.required' => 'Gaji pokok wajib diisi!',
            'potongan.required' => 'Potongan jangan kosong ya!',
        ];
    }
}

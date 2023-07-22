<?php

namespace App\Http\Requests;

use App\Models\Company;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class EmployeeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $this->customValidation();
        return [
            'first_name'          => ['required', 'max:100'],
            'last_name'           => ['required', 'max:100'],
            'email'               => ['required', 'max:100', 'email','unique:employees,email,'.$this->id],
            'phone'               => ['nullable', 'max:20'],
            'company_id'          => ['required', 'numeric', 'company_id_validation']
        ];
    }

    public function customValidation()
    {
        Validator::extend('company_id_validation',function ($attribute, $value, $parameter,$validator){
            if(Company::find($value))
                return true;
            return false;
        } );
    }

    public function messages()
    {
        return [
            'company_id.company_id_validation' => "Please choose valid company"
        ];
    }
}

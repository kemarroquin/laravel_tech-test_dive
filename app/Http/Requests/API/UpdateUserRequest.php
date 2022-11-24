<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => ['required'],
            'lastname' => ['required'],
            'email' => ['required', 'email', 'unique:users,email,' . $this->id],
            'phone' => ['required'],
            'city' => ['required'],
            'birthdate' => ['required', 'date_format:Y-m-d'],
            'gender' => ['required', Rule::in(['Masculino', 'Femenino'])],
            'country' => ['required'],
            'address' => ['required'],
            'status' => ['required', Rule::in(['Activo', 'Inactivo'])],
            'company_id' => ['required', 'numeric', 'exists:companies,id']
        ];
    }
}

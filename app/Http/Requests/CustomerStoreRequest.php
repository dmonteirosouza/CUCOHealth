<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'document' => 'required|string',
            'birthdate' => 'required|date',
            'phone' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'document.required' => 'O campo CPF é obrigatório',
            'birthdate.required' => 'O campo data de nascimento é obrigatório',
            'phone.required' => 'O campo telefone é obrigatório',
        ];
    }
}

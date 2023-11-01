<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordFormRequest extends FormRequest
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
            'password' => ['required','confirmed','min:5','max:20'],
            'password_confirmation' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'password' => [
                'required' => 'A senha é obrigatória',
                'confirmed' => 'A confirmação não está igual a Senha',
                'min' => 'A senha precisa de no mínimo :min caracteres',
                'max' => 'A senha pode ter no máximo :max caracteres'
            ],
            'password_confirmation' => [
                'required' => 'A confirmação da senha é obrigatória'
            ]
        ];
    }
}

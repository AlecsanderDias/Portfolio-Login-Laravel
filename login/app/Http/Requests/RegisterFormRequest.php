<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'username' => ['required','min:5','max:50','unique:logins'],
            'email' => ['required','email','min:5','max:50','unique:logins'],
            'password' => ['required','confirmed','min:5','max:20'],
            'password_confirmation' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'username' => [
                'required' => 'O campo Nome é obrigatório',
                'min' => 'O campo Nome precisa de no mínimo :min caracteres',
                'max' => 'O campo Nome pode ter no máximo :max caracteres',
                'unique' => 'O Nome de Usuário já está sendo usado'
            ],
            'email' => [
                'required' => 'O campo Email é obrigatório',
                'email' => 'O formato do Email não é válido',
                'min' => 'O Email precisa de no mínimo :min caracteres',
                'max' => 'O Email pode ter no máximo :max caracteres',
                'unique' => 'O Email já está sendo utilizado'
            ],
            'password' => [
                'required' => 'A Senha é obrigatória',
                'confirmed' => 'A Confirmação não está igual a Senha',
                'min' => 'A Senha precisa de no mínimo :min caracteres',
                'max' => 'A Senha pode ter no máximo :max caracteres'
            ],
            'password_confirmation' => [
                'required' => 'A confirmação da Senha é obrigatória'
            ]
        ];
    }
}

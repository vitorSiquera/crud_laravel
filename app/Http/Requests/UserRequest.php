<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $userId = $this->route('user');
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . ($userId ? $userId->id : 'NULL'),
            'password' => 'required|confirmed|min:8',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório.',
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'O email deve ser um endereço de email válido.',
            'email.unique' => 'O email já está em uso.',
            'password.required' => 'A senha é obrigatória.',
            'password.confirmed' => 'A senha não corresponde.',
            'password.min' => 'A senha com no minimo :min caracteres',
        ];
    }
}

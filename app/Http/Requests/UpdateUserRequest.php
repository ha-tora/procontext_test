<?php

namespace App\Http\Requests;

class UpdateUserRequest extends ApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'  => ['string', 'max:255'],
            'email' => ['email', 'unique:users,email'],
            'age'   => ['integer', 'gt:0']
        ];
    }
}

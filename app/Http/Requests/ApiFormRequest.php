<?php

namespace App\Http\Requests;

use App\Exceptions\Api\BadRequestException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ApiFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function failedValidation(Validator $validator): void 
    {
        throw new BadRequestException($validator->errors()->toArray());    
    }
}

<?php

namespace App\Http\Requests;

use App\Exceptions\ApiValidationException;
use Illuminate\Contracts\Validation\Validator;

class ApiStrictFormRequest extends StrictFormRequest
{
    /**
     * @param Validator $validator
     * @throws ApiValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new ApiValidationException($validator);
    }
}

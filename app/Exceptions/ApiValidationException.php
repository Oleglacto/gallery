<?php

namespace App\Exceptions;

use Illuminate\Validation\ValidationException;

class ApiValidationException extends ValidationException
{
    public function render($request)
    {
        return $this->response ?? response()->json([
            'errors' => $this->validator->errors()
        ])->setStatusCode($this->status);
    }
}

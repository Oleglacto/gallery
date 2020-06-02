<?php

namespace Tests\data;

use App\Http\Requests\ApiStrictFormRequest;

class StrictRequest extends ApiStrictFormRequest
{
    public function rules()
    {
        return [
            'name'  => 'string',
            'age'   => 'required',
            'sex'   => 'string',
        ];
    }
}

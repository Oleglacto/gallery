<?php

namespace Gallery\Images\Http\Requests;

use App\Http\Requests\ApiStrictFormRequest;

class ImageStoreRequest extends ApiStrictFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => 'string',
            'file'  => 'required|image',
        ];
    }
}

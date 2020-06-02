<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StrictFormRequest extends FormRequest
{
    public function rules()
    {
        return [];
    }

    public function withValidator(Validator $validator)
    {
        $this->onlyExistsRulesInRequest($validator);
    }

    /**
     * Проверяем что в реквесте присутствуют
     * только описанные параметры в валидации
     *
     * @param Validator $validator
     */
    protected function onlyExistsRulesInRequest(Validator $validator)
    {
        $validator->after(function (Validator $validator) {
            $rulesKeys = array_keys($this->rules());
            $requestDataKeys = array_keys($this->all());

            foreach ($requestDataKeys as $requestKey) {
                if (array_search($requestKey, $rulesKeys) === false) {
                    $validator->errors()->add('parameters', 'Unavailable parameters');
                    return;
                }
            }
        });
    }
}

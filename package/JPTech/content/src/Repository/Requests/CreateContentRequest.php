<?php

namespace JPTech\Content\Repository\Requests;

use App\Repository\BaseFormRequest;

class CreateContentRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'module' => 'required',
        ];
    }
}

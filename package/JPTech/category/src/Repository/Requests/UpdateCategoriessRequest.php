<?php

namespace JPTech\Category\Repository\Requests;

use App\Repository\BaseFormRequest;

class UpdateCategoriesRequest extends BaseFormRequest
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

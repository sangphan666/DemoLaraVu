<?php

namespace JPTech\Slug\Repository\Requests;

use App\Repository\BaseFormRequest;

class UpdateSlugRequest extends BaseFormRequest
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

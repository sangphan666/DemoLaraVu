<?php

namespace JPTech\Category\Repository\Requests;

use App\Repository\BaseFormRequest;

class CreateSlugRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'name'=> 'required',
            'slug'=> 'required',
            //'meta_title'=> ['required'],
            //'meta_description'=> ['required'],
            //'meta_keywords'=> ['required'],
            //'social_title'=> ['required'],
           //'social_description'=> ['required'],
            //'social_ogImage'=> ['required'],
            //'type'=> ['required'],
            'module' => 'required'
            /*'create_user'=> ['required'],
            'update_user'=> ['required'],
            'create_date'=> ['required'],
            'update_date'=> ['required'],
            'deleted_at'=> ['required']'*/
        ];
    }

    public function messages()
    {
        return [
            'module.required' => 'Không tồn tại module!',
            'name.required' => 'Không tồn tại tên!',
            'slug.required' => 'Không tồn tồn tại url'
        ];
    }
}

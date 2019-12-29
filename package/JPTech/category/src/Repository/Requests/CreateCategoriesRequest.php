<?php

namespace JPTech\Category\Repository\Requests;

//use App\Repository\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateCategoriesRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
            'category_name' => 'required',
            /*'name_ascii' => 'required',
            'image' => 'required',
            'description' => 'required',
            'position' => 'required',
            'parent_id' => 'required',
            'is_show' => 'required',*/
            'slug' => 'required',
            'content' => 'required'
            /*'create_user' => 'required',
            'update_user' => 'required',
            'create_date' => 'required',
            'update_date' => 'required',
            'deleted_at' => 'required',*/
        ];
    }
}

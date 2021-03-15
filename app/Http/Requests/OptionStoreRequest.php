<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OptionStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'link'      => 'required|string|max:255',
            'caption'   => 'required|string|max:20',
            'abstract'  => 'required|string|max:200',
            'target'    => 'required|in:_blank,_self,_parent,_top',
            'parent_id' => 'required|integer',
            'level'     => 'required|in:root,node,child',
            'profiles'  => 'required|array',
        ];
    }
}

<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $name_rules = 'required|string|min:2|max:50|unique:categories,name,';

        if ($this->getMethod() == 'PUT') $name_rules .= $this->category->id;

        return ['name' => $name_rules];
    }
}

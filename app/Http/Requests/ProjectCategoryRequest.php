<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Validator;

class ProjectCategoryRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static function rules()
    {
        return [
            'name' => 'required|max:255'
        ];
    }


    public static function validateData($data = array())
    {
        return Validator::make($data, self::rules());
    }
}

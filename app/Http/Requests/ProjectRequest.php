<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Validator;

class ProjectRequest extends Request
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
            'name' => 'required|max:255',
            'year' => 'required|max:16',
            'project_producer_id' => 'required|integer',
            'type' => 'required|array',
            'project_category_id' => 'required|integer',
            'thumb' => 'required',
        ];
    }


    public static function validateData($data = array(), $isUpdate = true)
    {
        $rules = self::rules();
        if ($isUpdate) {
            $rules['image_thumb'] = '|mimes:jpeg,png,gif,jpg';
        }
        return Validator::make($data, self::rules());
    }
}

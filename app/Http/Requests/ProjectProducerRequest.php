<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Validator;

class ProjectProducerRequest extends Request
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
            'name' => 'required|max:255|unique:tbl_project_producers,name',
            'slug' => 'required|max:255|unique:tbl_project_producers,slug'
        ];
    }


    public static function validateData($data = array(), $id = null)
    {
        $rules = self::rules();
        if ($id) {
            $rules['name'] .= ',' . $id;
            $rules['slug'] .= ',' . $id;
        }
        return Validator::make($data, $rules);
    }
}

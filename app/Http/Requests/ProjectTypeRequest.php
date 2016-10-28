<?php

namespace App\Http\Requests;

use App\Models\ProjectCategory;
use Illuminate\Support\Facades\Validator;

class ProjectTypeRequest extends Request
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
            'name' => 'required|max:255|unique:tbl_project_types,name'
        ];
    }


    public static function validateData($data = array(), $id = null)
    {
        $rules = self::rules();
        $categoryId = isset($data['project_category_id']) ? $data['project_category_id'] : 0;
        $projectCategory = ProjectCategory::find($categoryId);
        if ($projectCategory) {
            $url = url('/').$projectCategory->link.'/type';
        } else {
            $url = null;
        }
        if ($url) {
            $rules['link'] = 'required|url|regex:[^' . $url . '/]|not_in:' . $url . '/|unique:tbl_project_types,link';
        }

        if ($id) {
            $rules['name'] .= ',' . $id;
            if ($url) {
                $rules['link'] .= ',' . $id;
            }
        }
        return Validator::make($data, $rules);
    }
}

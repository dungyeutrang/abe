<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Validator;
use App\Models\ProjectCategory;

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
            'name' => 'required|max:255|unique:tbl_projects,name',
            'year' => 'required|max:16',
            'project_producer_id' => 'required|integer',
            'type' => 'required|array',
            'project_category_id' => 'required|integer',
            'thumb' => 'required',
        ];
    }


    public static function validateData($data = array(), $id = true)
    {
        $rules = self::rules();
        $categoryId = isset($data['project_category_id']) ? $data['project_category_id'] : 0;
        $projectCategory = ProjectCategory::find($categoryId);
        if ($projectCategory) {
            $url = url('/').$projectCategory->link;
        } else {
            $url = null;
        }
        if ($url) {
            $rules['link'] = 'required|url|regex:[^' . $url . '/]|not_in:' . $url . '/|unique:tbl_projects,link';
        }

        if (isset($data['thumb']) && !is_string($data['thumb'])) {
            $rules['thumb'] .= '|mimes:jpeg,png,gif,jpg';
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

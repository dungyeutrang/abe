<?php

namespace App\Http\Requests;

use App\Models\NewType;
use Illuminate\Support\Facades\Validator;

class NewRequest extends Request
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
            'name' => 'required|max:255|unique:tbl_news,name',
            'date' => 'required|max:16',
            'new_id' => 'required|integer',
            'thumb' => 'required',
            'link' => 'required|url|regex:[^' . route('front.new') . '/]|not_in:' . route('front.new') . '/|unique:tbl_news,link'
        ];
    }


    public static function validateData($data = array(), $id = true)
    {
        $rules = self::rules();
        $newTypeId = isset($data['new_id']) ? $data['new_id'] : 0;
        $newType = NewType::find($newTypeId);
        if ($newType) {
            $url = url('/') . $newType->link;
        } else {
            $url = null;
        }
        if ($url) {
            $rules['link'] = 'required|url|regex:[^' . $url . '/]|not_in:' . $url . '/|unique:tbl_project_types,link';
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

<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Validator;

class ProfileRequest extends Request
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
            'avatar' => 'required'
        ];
    }

    public static function validateData($data = array())
    {
        $rules = self::rules();
        if (isset($data['avatar']) && !is_string($data['avatar'])) {
            $rules['avatar'] .= '|mimes:jpeg,png,gif,jpg';
        }
        return Validator::make($data, $rules);
    }
}

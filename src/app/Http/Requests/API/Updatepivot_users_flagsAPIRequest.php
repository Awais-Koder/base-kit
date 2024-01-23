<?php

namespace App\Http\Requests\API;

use App\Models\pivot_users_flags;
use InfyOm\Generator\Request\APIRequest;

class Updatepivot_users_flagsAPIRequest extends APIRequest
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
        $rules = pivot_users_flags::$rules;
        
        return $rules;
    }
}

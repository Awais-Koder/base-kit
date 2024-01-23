<?php

namespace App\Http\Requests\API;

use App\Models\adm_category_colors;
use InfyOm\Generator\Request\APIRequest;

class Createadm_category_colorsAPIRequest extends APIRequest
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
        return adm_category_colors::$rules;
    }
}

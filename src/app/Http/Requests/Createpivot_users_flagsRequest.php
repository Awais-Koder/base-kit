<?php

namespace App\Http\Requests;

use App\Models\pivot_users_flags;
use Illuminate\Foundation\Http\FormRequest;

class Createpivot_users_flagsRequest extends FormRequest
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
        return pivot_users_flags::$rules;
    }
}

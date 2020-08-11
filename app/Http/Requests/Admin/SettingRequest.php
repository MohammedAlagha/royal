<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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

            return [
                'name' => 'required|min:2',
                'mobile'=>'required|min:6',
                'email'=>'required|email',
                'latitude'=>'required|numeric',
                'longitude'=>'required|numeric',
                'our_mission'=>'required|min:20',
                'main_about'=>'required|min:20',
                'minor_about'=>'required|min:20'

            ];

    }
}

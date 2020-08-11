<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        switch($this->method())
        {
            case "GET":
            case "DELETE":
                return [];

            case "PUT":
            case "PATCH":
            case "POST":
                {
                    return
                        [
                            'title' =>'required|min:3',
                            'image' => 'required|',
                            'details'=>'required|min:12|image',

                        ];
                }
                break;


        }
    }

}

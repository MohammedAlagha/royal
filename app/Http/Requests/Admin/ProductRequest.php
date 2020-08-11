<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                            'name' =>'required|min:3',
                            'price' => 'required|numeric|min:0',
                            'description'=>'required|min:12',
                            'category_id' => 'required|int|exists:categories,id',
                            'image' => 'image',
                        ];
                }
                break;


        }

    }
}

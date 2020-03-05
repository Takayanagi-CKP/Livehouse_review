<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivehouseRequest extends FormRequest
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
            'livehouse_name'       => 'required|string|max:50',
            'livehouse_short_name' => 'required|string|max:50',
            'livehouse_detail'     => 'required|string|max:500',
            'livehouse_url'        => 'required|string|max:200',
            'genre'                => 'required|string|max:50',
            'area'                 => 'required|integer|max:7',
            'region'               => 'required|string|max:50',
            'city'                 => 'required|string|max:50',
            'address'              => 'required|string|max:200',
            'capacity'             => 'required|integer|max:100000',
            'tag1'                 => 'nullable|string|max:50',
            'tag2'                 => 'nullable|string|max:50',
            'tag3'                 => 'nullable|string|max:50',
            'keyword'              => 'nullable|max:200'
        ];
    }

    public function messages() {
        return [
            'required'    => ':attribute は必須項目です。',
            'string'      => ':attribute は文字で入力してください。',
            'integer'     => ':attribute は半角数字で入力してください。',
            'opinion.max' => ':attribute は50文字以内で入力してください。'
        ];
    }
}
<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    // リダイレクトのオーバーライド
    protected $redirect = "";

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $this->redirect = 'review?id=' . $request->id . '#comment';
        return [
            'user_name'     => 'string|max:50',
            'title'         => 'required|string|max:200',
            'comments'      => 'required|string|max:5000',
            'user_type'     => 'required|integer|max:2',
            'points'        => 'required|numeric|min:0.5|max:5',
        ];
    }

    public function messages() {
        return [
            'required'    => ':attribute は必須項目です。',
            'string'      => ':attribute は文字で入力してください。',
            'integer'     => ':attribute は半角数字で入力してください。',
            'numeric'     => ':attribute は半角数字で入力してください。',
            'opinion.max' => ':attribute は :max 文字以内で入力してください。'
        ];
    }
}
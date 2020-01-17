<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'question' => 'required|string|max:255|min:3',
            'answer.*' => 'required|string',
            'points.*' => 'required|numeric',
            //'points.*' => 'required',
            //"correct_answer.*" => 'required|nullable|in:1,0',
            "correct_answer" => 'required|min:1',
        ];
    }
}

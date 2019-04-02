<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestsRequest extends FormRequest
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
            'test_name' => 'required|string|max:255|min:3',
            'add_question' => 'required|array|min:1',
        ];
    }
}

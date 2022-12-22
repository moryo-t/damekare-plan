<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Contracts\Service\Attribute\Required;

class ChatRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'message' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'message.required' => 'フォームに値を入力してください。',
        ];
    }
}

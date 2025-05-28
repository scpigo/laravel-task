<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'good_id' => 'required|integer|exists:goods,id',
            'good_quantity' => 'required|integer',
            'buyer_fio' => 'required|string|regex:/^[а-яёА-ЯЁ\s\-]{2,}\s[а-яёА-ЯЁ\s\-]{2,}\s[а-яёА-ЯЁ\s\-]{2,}$/iu',
            'comment' => 'string|nullable'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязательно для заполнения.',
            'string' => 'Поле :attribute должно быть строкой.',
            'integer' => 'Поле :attribute должно быть числом.',
            'exists' => ':attribute не найден в базе данных',
            'regex' => ':attribute должен быть ФИО',
        ];
    }

    public function getData(): mixed
    {
        return $this->validated();
    }
}

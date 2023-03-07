<?php

namespace App\Http\Requests\Backend\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() : array
    {
        return [ //ключі,які ми дозволяємо приймати, та тип значень які ми повинні отримати
            'name' => 'string', //'name' => 'required|string'
            'email' => 'string',
            'role' => 'string',
        ];
    }
}

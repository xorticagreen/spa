<?php

namespace App\Http\Requests\Backend\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'string', // 'name' => 'required|string'
            'description' => '', //якщо = '' то може бути що завгодно
            'is_published' => 'string', //is_published' => 0, - значення за умлвченням
            'is_new' => 'string',
            'sort_order' => 'int',
        ];
    }
}

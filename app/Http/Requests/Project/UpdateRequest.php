<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
//    public function rules(): array
//    {
//        return [
//            'name' => 'required|string',
//            'age' => 'nullable|integer',
//            'major' => 'nullable|string',
//            'year' => 'nullable|integer',
//            'resident' => 'nullable|boolean',
//            'birthday'=>'nullable|date'
//        ];
//    }


    public function rules(): array
    {
        return [
            'title' => [
                'sometimes', // поле необязательное при обновлении
                'string',
                'max:255',
                Rule::unique('projects')->ignore($this->project)
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'title.string' => 'Название должно быть строкой',
            'title.max' => 'Название не должно превышать 255 символов',
            'title.unique' => 'Проект с таким названием уже существует',
        ];
    }
}

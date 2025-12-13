<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
    public function rules(): array
    {
        return [

           'name'=>'required|string',
            'age'=>'nullable|integer',
           'major'=>'nullable|string',
           'year'=>'nullable|integer',
           'resident'=>'nullable|boolean',
           'birthday'=>'nullable|date'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Имя обязательно для заполнения',
            'name.string' => 'Имя должно быть строкой',
            'age.integer' => 'Возраст должен быть числом',
            'major.string' => 'Специальность должна быть строкой',
            'year.integer' => 'Курс должен быть числом',
            'resident.boolean' => 'Система оплаты должна быть тру или фолс',
            'birthday.date' => 'Дата рождения должна быть праильной',
        ];
    }
}

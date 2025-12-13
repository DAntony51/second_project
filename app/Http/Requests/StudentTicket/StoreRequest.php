<?php

namespace App\Http\Requests\StudentTicket;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'student_id' => 'required|exists:students,id|unique:student_tickets,student_id',
        ];
    }

    public function messages(): array
    {
        return [
            'student_id.required' => 'ID студента обязателен для заполнения',
            'student_id.exists' => 'Студент с таким ID не существует',
            'student_id.unique' => 'У этого студента уже есть студенческий билет',
        ];
    }
}

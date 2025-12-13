<?php

namespace App\Http\Requests\StudentTicket;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'student_id' => [
                'sometimes',
                'exists:students,id',
                Rule::unique('student_tickets')->ignore($this->student_ticket)
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'student_id.exists' => 'Студент с таким ID не существует',
            'student_id.unique' => 'У этого студента уже есть студенческий билет',
        ];
    }
}

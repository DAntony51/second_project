<?php

namespace App\Mapper;

use App\Models\Student;

class StudentMapper
{
public static function storeMap(Student $student):Student
{
    $student->new_attr = 'new attr';
    $student->formatted_date = $student->created_at->format('d-m-Y');
    return $student;
}
}

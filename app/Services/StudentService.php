<?php

namespace App\Services;

use App\Models\Student;
use App\Models\Worker;

class StudentService
{
 public static function store(array $data):Student
 {
    return Student::create($data);
 }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Http\Resources\Worker\StudentResource;
use App\Mapper\StudentMapper;
use App\Models\Faculty;
use App\Models\Project;
use App\Models\Student;
use App\Models\StudentTicket;
use App\Services\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function store(StoreRequest $request)
    {

        $data = $request->validated();

        $studentService = StudentService::store($data);

        $studentMapper = StudentMapper::storeMap($studentService);

        $studentResource = StudentResource::make($studentMapper)->resolve();

        return view('student.index');
    }
    public function create()
    {

        return view('student.create');
    }

    public function index()
    {
//        $students = Student::all();
//        $students = StudentResource::collection($students)->resolve();
//        dd($students);



        $students = Student::all();
        return view('student.index', compact('students'));

    }


    public function show(Student $student)
    {

        return view('student.show', compact('student'));
    }

    public function update(UpdateRequest $request, Student $student)
    {
        $data = $request->validated();
        $student->update($data);
        return redirect()->route('students.show', $student->id);


    }

    public function edit(Student $student)
    {
        return view('student.edit', compact('student'));
    }

    public function destroy(Student $student)
    {

        $student->delete();
        return redirect()->route('students.index');
    }






}



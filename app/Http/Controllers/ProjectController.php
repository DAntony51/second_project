<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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

class ProjectController extends Controller
{

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $studentService = StudentService::store($data);
        $studentMapper = StudentMapper::storeMap($studentService);

        return StudentResource::make($studentMapper); // ← Просто возвращаем ресурс

    }
//    public function store(StoreRequest $request)
//    {
//
//        $data = $request->validated();
//
//        $studentService = StudentService::store($data);
//
//        $studentMapper = StudentMapper::storeMap($studentService);
//
//        $studentResource = StudentResource::make($studentMapper)->resolve();
//
//        return view('student.index');
//    }
    public function create()
    {

        return view('student.create');
    }

    public function index()
    {

        $projects = Project::all();
        return $projects;


//        $students = Student::all();
//        return view('student.index', compact('students'));

    }


    public function show(Project $project)
    {

        dd($project);
    }

    public function update(Project $project)
    {

        $project->update($project);
        return redirect()->route('project.show', $project->id);


    }

//    public function edit(Student $student)
//    {
//        return view('student.edit', compact('student'));
//    }

    public function destroy(Project $project)
    {

        $project->delete();
        return redirect()->route('projects.index');
    }
}

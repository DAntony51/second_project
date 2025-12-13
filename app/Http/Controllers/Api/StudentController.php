<?php

namespace App\Http\Controllers\Api;

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

class StudentController extends Controller
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
//    public function create()
//    {
//
//        return view('student.create');
//    }





    public function index()
    {


        if(request()->header('token') === config('student.student_token')){
            $students = Student::all();
            $students = StudentResource::collection($students)->resolve();
            return $students;

        }

        return response()->json([
'message'=>'Unauthorized'
        ], 401);



//        $students = StudentResource::collection($students)->resolve();
//        return $students;



//        $students = Student::all();
//        return view('student.index', compact('students'));

    }



    public function show(Student $student)
    {
        // Load the relationships
        return response()->json($student->load(['projects', 'faculty', 'studentticket']));
    }


    public function update(UpdateRequest $request, Student $student)
    {
        $data = $request->validated();
        $student->update($data);


        return response()->json($student);
    }

//    public function edit(Student $student)
//    {
//        return view('student.edit', compact('student'));
//    }


    public function destroy(Student $student)
    {
        $student->delete();


        return response()->json(null, 204);
    }
    public function attachProjects(Request $request, Student $student)
    {
        $request->validate([
            'project_ids' => 'required|array',
            'project_ids.*' => 'exists:projects,id'
        ]);

        $student->projects()->attach($request->project_ids);

        return response()->json([
            'message' => 'Projects attached successfully',
            'student' => $student->load('projects')
        ]);
    }

    public function detachProjects(Request $request, Student $student)
    {
        $request->validate([
            'project_ids' => 'required|array',
            'project_ids.*' => 'exists:projects,id'
        ]);

        $student->projects()->detach($request->project_ids);

        return response()->json([
            'message' => 'Projects detached successfully',
            'student' => $student->load('projects')
        ]);
    }

    public function syncProjects(Request $request, Student $student)
    {
        $request->validate([
            'project_ids' => 'required|array',
            'project_ids.*' => 'exists:projects,id'
        ]);

        $student->projects()->sync($request->project_ids);

        return response()->json([
            'message' => 'Projects synced successfully',
            'student' => $student->load('projects')
        ]);
    }

}



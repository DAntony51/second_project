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
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FacultyController extends Controller
{

//    public function store()
//    {
//        Faculty::create([
//            'title'=> 'Organic'
//        ]);
//
//        return 'created';
//
//    }

    public function store(\App\Http\Requests\Faculty\StoreRequest $request): JsonResponse
    {
        $data = $request->validated();
        $faculty = Faculty::create($data);

        return response()->json($faculty, 201);
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



    public function index(): JsonResponse
    {
        $faculties = Faculty::with('students')->get();
        return response()->json($faculties);
    }



    public function show(Faculty $faculty): JsonResponse
    {
        return response()->json($faculty->load('students'));
    }


//    public function update()
//    {
//
//        $faculty = Faculty::find(7);
//        $faculty->update([
//            'title'=> 'Chemistry'
//        ]);
//        return 'updated!';
//
//
//    }
    public function update(\App\Http\Requests\Faculty\UpdateRequest $request, Faculty $faculty)
    {
        $data = $request->validated();
        $faculty->update($data);

        return response()->json($faculty->load('students'));
    }



//    public function edit(Student $student)
//    {
//        return view('student.edit', compact('student'));
//    }

    public function destroy(Faculty $faculty): JsonResponse
    {
        $faculty->delete();
        return response()->json(null, 204);
    }






}



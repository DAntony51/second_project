<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentTicket\StoreRequest;
use App\Http\Requests\StudentTicket\UpdateRequest;
use App\Models\Student;
use App\Models\StudentTicket;
use Illuminate\Http\JsonResponse;

class StudentTicketController extends Controller
{
    public function index(): JsonResponse
    {

        $studentTickets = StudentTicket::with('student')->get();
        return response()->json($studentTickets);
    }

    public function store(StoreRequest $request): JsonResponse
    {
        $data = $request->validated();
        $studentTicket = StudentTicket::create($data);

        return response()->json($studentTicket->load('student'), 201);
    }

    public function show(StudentTicket $studentTicket): JsonResponse
    {
        return response()->json($studentTicket->load('student'));
    }

    public function update(UpdateRequest $request, StudentTicket $studentTicket): JsonResponse
    {
        $data = $request->validated();
        $studentTicket->update($data);

        return response()->json($studentTicket->load('student'));
    }

    public function destroy(StudentTicket $studentTicket): JsonResponse
    {
        $studentTicket->delete();
        return response()->json(null, 204);
    }
}

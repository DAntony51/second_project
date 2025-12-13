<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function store()
    {
        Faculty::create([
'title'=>'Biology'
        ]);
        return 'created';
    }
    public function index()
    {


        $faculty = Faculty::all();
        return $faculty;
    }
    public function show(Faculty $faculty)
    {
//        $faculty = Faculty::find(1);
        dd($faculty);
    }
    public function destroy(Faculty $faculty)
    {
        $fac = Faculty::find(5);
        $fac->delete();
        return 'deleted';
    }
    public function update(Faculty $faculty)
    {
        $fac = Faculty::find(1);
    }


}

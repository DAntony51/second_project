<?php

namespace App\Http\Controllers;

use App\Models\Girl;
use App\Models\girls;
use Illuminate\Http\Request;

class GirlsController extends Controller
{
    public function store()
    {
        Girl::create(
            [
                'name' => 'Vikki',
                'age' => 25
            ]);
        return 'success!';
    }
    public function index()
    {

        $girl = Girl::all();
        dd($girl);
    }
    public function show()
    {

    }
    public function delete()
    {

    }

}

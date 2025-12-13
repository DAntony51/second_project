<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    //
    public function store()
    {
        dd(request()->all());
        $str = 24;
        Worker::create([
            'name'=>'Danil',
            'age'=>$str
        ]);
        return 'ok';
    }

    public function create()
    {
        return view('worker.create');
    }


    public function index()
    {
        $workers = Worker::all();
        dd($workers);
    }
    public function show(Worker $worker)
    {
        dd($worker);

    }
    public function update()
    {
        dd(111);
    }

    public function delete()
    {
        $id = 2;
        $worker = Worker::find($id);
        $worker->delete();
        return 'deleted';
    }
}

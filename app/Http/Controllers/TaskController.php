<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Session;

class TaskController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth:admin');
//    }

    public function index()
    {
        $tasks = Task::orderBy('id','desc')->paginate(5);
        return view('home.index',[
            'tasks'=>$tasks
        ]);

    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required|min:5|max:255',
        ]);

        $tasks = new Task();

        $tasks->name = $request->name;
        $tasks->save();
        Session::flash('success','New task has been successfully added!');
        return back();



    }


    public function show(Task $task)
    {

    }


    public function edit($id)
    {
        $task = Task::find($id);
        return view('task.edit',[
            'task'=>$task
        ]);

    }


    public function update(Request $request, Task $task)
    {
        $this->validate($request,[
            'name'=> 'required|min:5|max:255',
        ]);

        $tasks =  Task::find($request->id);

        $tasks->name = $request->name;
        $tasks->save();
        Session::flash('success','Task has been update successfully! ');
        return redirect()->route('task');

    }


    public function destroy(Request $request)
    {
        $task = Task::find($request->id);
        $task->soft = 1;
        $task->save();
        Session::flash('success','Task has been Delete successfully! ');
        return redirect()->route('task');


    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $task = Task::all()->sortDesc();
        return view('home', compact('task'));
    }

    public function task_store(Request $request){
        $data = $request->validate([
            'task_name' => 'required|min:4|max:100'
        ]);

        Task::create($data);
        return redirect()->back();
    }

    public function task_destroy(Task $task){
        $task->delete();
        return redirect()->back();
    }

    public function task_complete(Task $task){
        $task->update(["status" => "complete"]);
        return redirect()->back();
    }

}
